<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureTenantAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Check session-based authentication first (for tenant context)
        $sessionUser = session('user', []);
        
        // Then check request-based authentication
        $user = null;
        if ($request->hasHeader('Authorization')) {
            try {
                $user = $request->user();
            } catch (\Exception $e) {
                // Auth guard not available, continue with session check
            }
        }
        
        if (!$user && empty($sessionUser)) {
            return redirect('/login');
        }

        $tenantId = $user->tenant_id ?? ($sessionUser['tenant_id'] ?? null);

        if (!$tenantId) {
            session()->invalidate();
            session()->regenerateToken();

            return redirect('/login')->with('error', 'Tenant context is required.');
        }

        $tenant = Tenant::where('tenant_id', $tenantId)->first();

        if (!$tenant) {
            session()->invalidate();
            session()->regenerateToken();

            return redirect('/login')->with('error', 'Tenant not found.');
        }

        if (in_array($tenant->status, ['inactive', 'suspended', 'unpaid'], true)
            || in_array($tenant->payment_status, ['unpaid', 'overdue'], true)
        ) {
            return response()->view('tenant.blocked', [
                'tenant' => $tenant,
                'message' => $tenant->suspended_message ?: 'Please contact your administrator.',
            ], 403);
        }

        $subscription = $tenant->subscription ?? [];
        $status = strtolower($subscription['status'] ?? 'cancelled');

        if (!in_array($status, ['active', 'trial'], true)) {
            return redirect('/pricing')->with('error', 'Your subscription is not active. Please renew your plan.');
        }

        session(['tenant' => $tenant->toArray()]);
        session(['user.tenant_id' => $tenant->tenant_id]);

        return $next($request);
    }
}
