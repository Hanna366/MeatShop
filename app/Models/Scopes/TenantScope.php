<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (!Schema::hasColumn($model->getTable(), 'tenant_id')) {
            return;
        }

        $tenantId = $this->resolveTenantId();

        if (!$tenantId) {
            return;
        }

        $builder->where($model->getTable() . '.tenant_id', $tenantId);
    }

    protected function resolveTenantId(): ?string
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
