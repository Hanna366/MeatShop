<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SimpleAuthController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    'tenant.active',
])->group(function () {
    Route::get('/login', [SimpleAuthController::class, 'showLoginForm'])->name('tenant.login');
    Route::post('/login', [SimpleAuthController::class, 'login'])->name('tenant.login.post');
    Route::post('/logout', [SimpleAuthController::class, 'logout'])->name('tenant.logout');
    Route::get('/forgot-password', [SimpleAuthController::class, 'showForgotPasswordForm'])->name('tenant.password.request');
    Route::post('/forgot-password', [SimpleAuthController::class, 'sendResetLink'])->name('tenant.password.email');
    Route::get('/reset-password/{token}', [SimpleAuthController::class, 'showResetPasswordForm'])->name('tenant.password.reset');
    Route::post('/reset-password', [SimpleAuthController::class, 'resetPassword'])->name('tenant.password.update');

    Route::get('/', function () {
        return redirect('/login');
    })->name('tenant.home');

    Route::middleware(['tenant.auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('tenant.dashboard');

        // Basic Plan Features (Available to all)
        Route::get('/products', function () {
            return view('products');
        })->name('tenant.products');

        Route::get('/inventory', function () {
            return view('inventory');
        })->name('tenant.inventory');

        Route::get('/sales', function () {
            return view('sales');
        })->name('tenant.sales');

        Route::get('/profile', function () {
            return view('profile');
        })->name('tenant.profile');

        // Standard Plan Features (Require Standard or higher)
        Route::get('/customers', function () {
            return view('customers');
        })->middleware('plan:standard')->name('tenant.customers');

        Route::get('/suppliers', function () {
            return view('suppliers');
        })->middleware('plan:standard')->name('tenant.suppliers');

        Route::get('/reports', function () {
            return view('reports');
        })->middleware('plan:standard')->name('tenant.reports');

        // Premium Plan Features (Require Premium or higher)
        Route::get('/analytics', function () {
            return view('analytics');
        })->middleware('plan:premium')->name('tenant.analytics');

        Route::get('/employees', function () {
            return view('employees');
        })->middleware('plan:premium')->name('tenant.employees');

        Route::get('/payroll', function () {
            return view('payroll');
        })->middleware('plan:premium')->name('tenant.payroll');

        // Enterprise Plan Features (Require Enterprise)
        Route::get('/multi-store', function () {
            return view('multi-store');
        })->middleware('plan:enterprise')->name('tenant.multi-store');

        Route::get('/api-integration', function () {
            return view('api-integration');
        })->middleware('plan:enterprise')->name('tenant.api-integration');

        Route::get('/white-label', function () {
            return view('white-label');
        })->middleware('plan:enterprise')->name('tenant.white-label');

        // Settings - Available based on plan
        Route::get('/settings', function () {
            return view('settings');
        })->middleware('plan:standard')->name('tenant.settings');
    });
});
