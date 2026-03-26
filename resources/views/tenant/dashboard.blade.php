@extends('layouts.tenant')

@section('title', 'Dashboard - ' . ($tenant->business_name ?? 'Tenant'))

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-primary text-white rounded-circle p-3 me-3">
                    <i class="fas fa-store fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">{{ $tenant->business_name ?? 'Tenant Dashboard' }}</h1>
                    <p class="text-muted mb-0">Welcome back! Here's your business overview</p>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <span class="badge bg-gradient-primary px-3 py-2">
                        <i class="fas fa-crown me-1"></i>{{ ucfirst($tenant->plan ?? 'Basic') }} Plan
                    </span>
                </div>
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-cog me-2"></i>Settings
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('tenant.profile') }}">
                        <i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('tenant.settings') }}">
                        <i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('tenant.logout') }}">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Total Sales</h6>
                            <div class="h3 mb-0 fw-bold">₱12,450</div>
                            <small class="opacity-75">Today's revenue</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-chart-line fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-success">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Products</h6>
                            <div class="h3 mb-0 fw-bold">247</div>
                            <small class="opacity-75">In inventory</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-box fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-warning">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Customers</h6>
                            <div class="h3 mb-0 fw-bold">89</div>
                            <small class="opacity-75">Active customers</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-info">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Orders</h6>
                            <div class="h3 mb-0 fw-bold">34</div>
                            <small class="opacity-75">Today's orders</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Menu with Plan Restrictions -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-th-large me-2 text-primary"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Basic Plan Features -->
                        <div class="col-md-4">
                            <a href="{{ route('tenant.products') }}" class="text-decoration-none">
                                <div class="card h-100 border-0 shadow-sm plan-feature basic">
                                    <div class="card-body text-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                            <i class="fas fa-box text-primary fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold">Products</h6>
                                        <p class="text-muted small mb-0">Manage inventory</p>
                                        <span class="badge bg-success mt-2">Available</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('tenant.inventory') }}" class="text-decoration-none">
                                <div class="card h-100 border-0 shadow-sm plan-feature basic">
                                    <div class="card-body text-center">
                                        <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                            <i class="fas fa-warehouse text-info fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold">Inventory</h6>
                                        <p class="text-muted small mb-0">Stock management</p>
                                        <span class="badge bg-success mt-2">Available</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('tenant.sales') }}" class="text-decoration-none">
                                <div class="card h-100 border-0 shadow-sm plan-feature basic">
                                    <div class="card-body text-center">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                            <i class="fas fa-cash-register text-success fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold">Sales</h6>
                                        <p class="text-muted small mb-0">POS system</p>
                                        <span class="badge bg-success mt-2">Available</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Standard Plan Features -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm plan-feature standard">
                                <div class="card-body text-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                        <i class="fas fa-user-friends text-warning fa-lg"></i>
                                    </div>
                                    <h6 class="fw-bold">Customers</h6>
                                    <p class="text-muted small mb-0">Customer management</p>
                                    <span class="badge bg-warning mt-2">
                                        <i class="fas fa-crown me-1"></i>Standard
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm plan-feature standard">
                                <div class="card-body text-center">
                                    <div class="bg-secondary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                        <i class="fas fa-truck text-secondary fa-lg"></i>
                                    </div>
                                    <h6 class="fw-bold">Suppliers</h6>
                                    <p class="text-muted small mb-0">Supplier management</p>
                                    <span class="badge bg-warning mt-2">
                                        <i class="fas fa-crown me-1"></i>Standard
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm plan-feature standard">
                                <div class="card-body text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                        <i class="fas fa-chart-bar text-primary fa-lg"></i>
                                    </div>
                                    <h6 class="fw-bold">Reports</h6>
                                    <p class="text-muted small mb-0">Business reports</p>
                                    <span class="badge bg-warning mt-2">
                                        <i class="fas fa-crown me-1"></i>Standard
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Premium Plan Features -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm plan-feature premium">
                                <div class="card-body text-center">
                                    <div class="bg-danger bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                        <i class="fas fa-chart-pie text-danger fa-lg"></i>
                                    </div>
                                    <h6 class="fw-bold">Analytics</h6>
                                    <p class="text-muted small mb-0">Advanced analytics</p>
                                    <span class="badge bg-danger mt-2">
                                        <i class="fas fa-gem me-1"></i>Premium
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm plan-feature premium">
                                <div class="card-body text-center">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                        <i class="fas fa-users-cog text-info fa-lg"></i>
                                    </div>
                                    <h6 class="fw-bold">Employees</h6>
                                    <p class="text-muted small mb-0">Staff management</p>
                                    <span class="badge bg-danger mt-2">
                                        <i class="fas fa-gem me-1"></i>Premium
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm plan-feature premium">
                                <div class="card-body text-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                        <i class="fas fa-money-check-alt text-success fa-lg"></i>
                                    </div>
                                    <h6 class="fw-bold">Payroll</h6>
                                    <p class="text-muted small mb-0">Payroll system</p>
                                    <span class="badge bg-danger mt-2">
                                        <i class="fas fa-gem me-1"></i>Premium
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-crown me-2 text-warning"></i>Plan Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="bg-gradient-warning text-white rounded-3 p-4">
                            <h6 class="text-uppercase mb-2">Current Plan</h6>
                            <div class="h4 fw-bold mb-0">{{ ucfirst($tenant->plan ?? 'Basic') }}</div>
                            <small>Monthly subscription</small>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Plan Status</span>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Monthly Cost</span>
                            <span class="fw-bold">${{ $tenant->plan === 'premium' ? '99' : ($tenant->plan === 'standard' ? '59' : '29') }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Next Billing</span>
                            <span class="fw-bold">Apr 15, 2024</span>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100 mb-2" onclick="showUpgradeModal()">
                            <i class="fas fa-arrow-up me-2"></i>Upgrade Plan
                        </button>
                        <a href="/pricing" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-info-circle me-2"></i>Compare Plans
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Handle plan feature clicks
document.querySelectorAll('.plan-feature').forEach(feature => {
    feature.addEventListener('click', function(e) {
        const planLevel = this.classList.contains('basic') ? 'basic' : 
                          this.classList.contains('standard') ? 'standard' : 
                          this.classList.contains('premium') ? 'premium' : 'enterprise';
        
        const currentPlan = '{{ strtolower($tenant->plan ?? 'basic') }}';
        
        if (!isPlanAccessible(currentPlan, planLevel)) {
            e.preventDefault();
            showPlanUpgradeAlert(planLevel);
        }
    });
});

function isPlanAccessible(current, required) {
    const hierarchy = { 'basic': 1, 'standard': 2, 'premium': 3, 'enterprise': 4 };
    return hierarchy[current] >= hierarchy[required];
}

function showPlanUpgradeAlert(requiredPlan) {
    Swal.fire({
        icon: 'warning',
        title: '🚫 Plan Upgrade Required',
        html: `
            <div style="text-align: left; padding: 10px;">
                <p><strong>Required Plan:</strong> <span class="badge bg-warning">${requiredPlan.charAt(0).toUpperCase() + requiredPlan.slice(1)}</span></p>
                <p><strong>Your Plan:</strong> <span class="badge bg-info">{{ ucfirst($tenant->plan ?? 'Basic') }}</span></p>
                <hr style="margin: 15px 0;">
                <p style="color: #666; margin-bottom: 20px;">
                    This feature is available only with the <strong>${requiredPlan.charAt(0).toUpperCase() + requiredPlan.slice(1)}</strong> plan or higher.
                </p>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <h6 style="margin-bottom: 10px;">📈 Upgrade Benefits:</h6>
                    <ul style="margin: 0; padding-left: 20px;">
                        <li>Access to advanced features</li>
                        <li>Enhanced reporting capabilities</li>
                        <li>Priority customer support</li>
                        <li>More storage and users</li>
                    </ul>
                </div>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: '🚀 Upgrade Plan',
        cancelButtonText: '❌ Cancel',
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        width: '600px'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/pricing';
        }
    });
}

function showUpgradeModal() {
    Swal.fire({
        icon: 'info',
        title: '🚀 Upgrade Your Plan',
        html: `
            <div style="text-align: left; padding: 10px;">
                <p>Ready to unlock more powerful features?</p>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <h6 style="margin-bottom: 10px;">Available Plans:</h6>
                    <ul style="margin: 0; padding-left: 20px;">
                        <li><strong>Standard:</strong> Customer & supplier management</li>
                        <li><strong>Premium:</strong> Advanced analytics & payroll</li>
                        <li><strong>Enterprise:</strong> Multi-store & API access</li>
                    </ul>
                </div>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: '📋 View Plans',
        cancelButtonText: '❌ Cancel',
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/pricing';
        }
    });
}
</script>

<style>
.plan-feature {
    transition: all 0.3s ease;
    cursor: pointer;
}

.plan-feature:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.plan-feature.standard:hover,
.plan-feature.premium:hover,
.plan-feature.enterprise:hover {
    cursor: not-allowed;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.bg-gradient-success {
    background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
}
.bg-gradient-warning {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.bg-gradient-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
</style>
@endsection
