<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentralDashboardController;
use App\Http\Controllers\SimpleAuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // If already authenticated, redirect to dashboard
    if (session('authenticated')) {
        return redirect('/dashboard');
    }
    // Otherwise show welcome page
    return view('welcome');
});

Route::get('/login', [SimpleAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SimpleAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [SimpleAuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CentralDashboardController::class, 'index'])->name('dashboard');
    
    // User profile and settings
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    // Tenant management (central app)
    Route::get('/tenants', [\App\Http\Controllers\TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenant/{tenantId}', [\App\Http\Controllers\TenantController::class, 'show'])->name('tenants.show');
    Route::get('/tenants/create', function () {
        return view('tenants.create');
    })->name('tenants.create');
    Route::post('/tenant/{tenantId}/updateStatus', [\App\Http\Controllers\TenantController::class, 'updateStatus'])->name('tenants.updateStatus');

    // Central subscription management routes for tenant admin
    Route::post('/subscription/process', [SubscriptionController::class, 'processSubscription'])->name('subscription.process');
    Route::post('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    Route::post('/subscription/renew', [SubscriptionController::class, 'renew'])->name('subscription.renew');
    Route::get('/subscription/status', [SubscriptionController::class, 'status'])->name('subscription.status');
    Route::get('/subscription/billing', [SubscriptionController::class, 'billingHistory'])->name('subscription.billing');
    Route::put('/subscription/settings', [SubscriptionController::class, 'updateSettings'])->name('subscription.settings');
});

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/test', function () {
    return 'Laravel Meat Shop POS is working!';
});

Route::get('/account/create', function () {
    return view('account.create');
})->name('account.create');

Route::post('/account/store', [AccountController::class, 'store'])->name('account.store');
