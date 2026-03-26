<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Tenant;

class CheckPlanRestrictions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $requiredPlan
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $requiredPlan = null)
    {
        // Get current tenant and user from session
        $tenant = session('tenant');
        $user = session('user');

        if (!$tenant || !$user) {
            return redirect('/login');
        }

        // Get tenant's current plan
        $currentPlan = strtolower($tenant['plan'] ?? 'basic');

        // Define plan hierarchy
        $planHierarchy = [
            'basic' => 1,
            'standard' => 2,
            'premium' => 3,
            'enterprise' => 4
        ];

        $currentLevel = $planHierarchy[$currentPlan] ?? 1;
        $requiredLevel = $planHierarchy[strtolower($requiredPlan)] ?? 1;

        // Check if user has access to this feature
        if ($currentLevel < $requiredLevel) {
            // Store notification data in session
            session()->flash('plan_restriction', [
                'current_plan' => ucfirst($currentPlan),
                'required_plan' => ucfirst($requiredPlan),
                'feature' => $this->getFeatureName($request->path()),
                'upgrade_url' => route('pricing')
            ]);

            // Redirect back with SweetAlert notification
            return redirect()->back()->with('show_plan_alert', true);
        }

        return $next($request);
    }

    /**
     * Get user-friendly feature name based on path
     */
    private function getFeatureName($path)
    {
        $featureMap = [
            'reports' => 'Advanced Reports',
            'analytics' => 'Analytics Dashboard',
            'api' => 'API Access',
            'inventory' => 'Inventory Management',
            'customers' => 'Customer Management',
            'suppliers' => 'Supplier Management',
            'employees' => 'Employee Management',
            'payroll' => 'Payroll System',
            'multi-store' => 'Multi-Store Management',
            'advanced-analytics' => 'Advanced Analytics',
            'custom-reports' => 'Custom Reports',
            'api-integration' => 'API Integration',
            'priority-support' => 'Priority Support',
            'white-label' => 'White Label Options'
        ];

        foreach ($featureMap as $key => $name) {
            if (strpos($path, $key) !== false) {
                return $name;
            }
        }

        return 'This Feature';
    }
}
