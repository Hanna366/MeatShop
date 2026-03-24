<?php

namespace App\Services;

class EntitlementService
{
    /**
     * Centralized feature-access decision for web flows.
     */
    public static function canAccess(?string $requiredFeature = null): array
    {
        if (!session('authenticated')) {
            return [
                'allowed' => false,
                'redirect' => '/login',
                'message' => 'Please login to access this feature.',
            ];
        }

        $tenantId = session('user.tenant_id') ?? auth()->user()->tenant_id ?? null;

        if (!$tenantId) {
            return [
                'allowed' => false,
                'redirect' => '/login',
                'message' => 'Tenant context is missing. Please log in again.',
            ];
        }

        $tenant = \App\Models\Tenant::where('tenant_id', $tenantId)->first();

        if (!$tenant || in_array($tenant->status, ['inactive', 'suspended', 'unpaid'], true)) {
            return [
                'allowed' => false,
                'redirect' => '/login',
                'message' => 'Tenant is not active. Contact support.',
            ];
        }

        $tenantSubscriptionStatus = strtolower($tenant->subscription['status'] ?? 'cancelled');

        if (!in_array($tenantSubscriptionStatus, ['active', 'trial'], true)) {
            return [
                'allowed' => false,
                'redirect' => '/pricing',
                'message' => 'Your subscription is not active. Please renew your plan.',
            ];
        }

        if ($requiredFeature && !SubscriptionService::hasFeature($requiredFeature)) {
            $currentPlan = session('user.plan', 'Basic');

            return [
                'allowed' => false,
                'redirect' => '/dashboard',
                'message' => "This feature requires {$requiredFeature}. Upgrade from {$currentPlan} Plan to unlock this feature.",
            ];
        }

        return [
            'allowed' => true,
            'redirect' => null,
            'message' => null,
        ];
    }
}
