<?php

namespace App\Models\Traits;

use App\Models\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

trait TenantScoped
{
    protected static function bootTenantScoped(): void
    {
        static::addGlobalScope(new TenantScope());

        static::creating(function ($model) {
            if (empty($model->tenant_id)) {
                $tenantId = static::resolveTenantId();

                if ($tenantId) {
                    $model->tenant_id = $tenantId;
                }
            }
        });
    }

    protected static function resolveTenantId(): ?string
    {
        if (Auth::check() && Auth::user()?->tenant_id) {
            return (string) Auth::user()->tenant_id;
        }

        if (session('user.tenant_id')) {
            return (string) session('user.tenant_id');
        }

        $request = request();
        if ($request && $request->user()?->tenant_id) {
            return (string) $request->user()->tenant_id;
        }

        if (app()->bound('tenant') && app('tenant')?->tenant_id) {
            return (string) app('tenant')->tenant_id;
        }

        return null;
    }
}
