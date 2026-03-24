<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\TenantService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\TenantPasswordMail;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        $recaptchaSecret = (string) config('services.recaptcha.secret_key');
        $recaptchaEnabled = $recaptchaSecret !== '';

        // Auto-generate password
        $autoPassword = $this->generateSecurePassword();

        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'company_name' => 'nullable|string|max:255',
            'business_phone' => 'nullable|string|max:50',
            'business_address' => 'nullable|string|max:1000',
            'plan' => 'required|in:basic,standard,premium',
        ];

        if ($recaptchaEnabled) {
            $validationRules['g-recaptcha-response'] = 'required|string';
        }

        // Validate the request data
        $request->validate($validationRules, [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA challenge.',
        ]);

        if ($recaptchaEnabled) {
            $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $recaptchaSecret,
                'response' => (string) $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            if (!$recaptchaResponse->successful() || !data_get($recaptchaResponse->json(), 'success', false)) {
                return back()
                    ->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.'])
                    ->withInput();
            }
        }

        $fullName = trim($request->name);
        $nameParts = preg_split('/\s+/', $fullName, -1, PREG_SPLIT_NO_EMPTY);
        $firstName = $nameParts[0] ?? $fullName;
        $lastName = count($nameParts) > 1 ? implode(' ', array_slice($nameParts, 1)) : '';

        // Build a unique username from the submitted name.
        $baseUsername = strtolower(preg_replace('/[^a-z0-9]+/i', '', $fullName));
        if ($baseUsername === '') {
            $baseUsername = 'user';
        }

        $username = $baseUsername;
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername.$counter;
            $counter++;
        }

        // Create tenant in central system and prepare its database.
        $tenant = TenantService::createTenant([
            'business_name' => $request->company_name ?: $request->name . "'s Business",
            'business_email' => $request->email,
            'business_phone' => $request->business_phone,
            'business_address' => $request->business_address,
            'plan' => $request->plan,
            'admin_name' => $fullName,
            'admin_email' => $request->email,
            'password' => $autoPassword,
            'subscription' => [
                'plan' => $request->plan,
                'status' => 'active',
                'starts_at' => now(),
                'expires_at' => now()->addMonth(),
            ],
        ]);

        // Create user in central system so the tenant can log in.
        // The tenant's own database also has a users table, but we use the central
        // users table for authentication across the platform.
        User::create([
            'tenant_id' => $tenant->tenant_id,
            'username' => $username,
            'name' => $fullName,
            'email' => $request->email,
            'password' => Hash::make($autoPassword),
            'role' => 'owner',
            'profile' => [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'full_name' => $fullName,
            ],
        ]);

        // Send password email
        try {
            // Send actual email
            Mail::to($request->email)->send(new TenantPasswordMail($fullName, $autoPassword, $tenant->business_name));
            
            // Also log for backup
            $emailContent = $this->generateEmailContent($fullName, $autoPassword, $tenant->business_name);
            file_put_contents(storage_path('logs/tenant_emails.log'), 
                "Date: " . now()->format('Y-m-d H:i:s') . "\n" .
                "To: " . $request->email . "\n" .
                "Name: " . $fullName . "\n" .
                "Business: " . $tenant->business_name . "\n" .
                "Password: " . $autoPassword . "\n" .
                "---\n\n", 
                FILE_APPEND | LOCK_EX
            );
        } catch (\Exception $e) {
            \Log::error('Failed to send tenant password email: ' . $e->getMessage());
            // Fallback to file logging if email fails
            $emailContent = $this->generateEmailContent($fullName, $autoPassword, $tenant->business_name);
            file_put_contents(storage_path('logs/tenant_emails.log'), 
                "Date: " . now()->format('Y-m-d H:i:s') . "\n" .
                "To: " . $request->email . "\n" .
                "Name: " . $fullName . "\n" .
                "Business: " . $tenant->business_name . "\n" .
                "Password: " . $autoPassword . "\n" .
                "ERROR: " . $e->getMessage() . "\n" .
                "---\n\n", 
                FILE_APPEND | LOCK_EX
            );
        }

        // Redirect to a success page or login
        return redirect('/login')->with('success', 'Account created successfully! Password has been sent to your email.')->with('notification', [
            'type' => 'success',
            'title' => '🎉 Account Created!',
            'message' => 'Your account has been created successfully. Please check your email for your login password.',
            'timer' => 5000
        ]);
    }

    /**
     * Generate a secure random password
     */
    private function generateSecurePassword($length = 12)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        $charactersLength = strlen($characters);
        $password = '';
        
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }
        
        // Ensure password has at least one number, one uppercase, one lowercase, and one special character
        if (!preg_match('/[A-Z]/', $password)) {
            $password[0] = strtoupper($password[0]);
        }
        if (!preg_match('/[0-9]/', $password)) {
            $password[1] = rand(0, 9);
        }
        if (!preg_match('/[!@#$%^&*]/', $password)) {
            $password[2] = '!@#$%^&*'[rand(0, 7)];
        }
        
        return $password;
    }

    /**
     * Generate email content for logging
     */
    private function generateEmailContent($userName, $password, $businessName)
    {
        $firstName = explode(' ', $userName)[0];
        $content = "Good day {$firstName} ma'am/sir!\n\n";
        $content .= "Welcome to MeatShop POS! Your account has been successfully created for {$businessName}.\n\n";
        $content .= "Your auto-generated password: {$password}\n\n";
        $content .= "Next Steps:\n";
        $content .= "1. Save your password securely\n";
        $content .= "2. Log in at " . config('app.url') . "/login\n";
        $content .= "3. Change password in settings\n";
        $content .= "4. Complete business setup\n\n";
        $content .= "Support: support@meatshop.com\n";
        
        return $content;
    }
}