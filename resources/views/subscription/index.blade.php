@extends('layouts.central')

@section('title', 'Subscription Management - MeatShop POS')

@section('content')
<div class="container-fluid">
    <!-- Modern Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-primary text-white rounded-circle p-3 me-3">
                    <i class="fas fa-crown fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">Subscription Management</h1>
                    <p class="text-muted mb-0">Manage your subscription plans and billing</p>
                </div>
            </div>
        </div>
        <div>
            <div class="btn-group">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-download me-2"></i>Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-file-pdf me-2"></i>Export PDF</a></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-file-excel me-2"></i>Export Excel</a></li>
                </ul>
            </div>
            <a href="{{ route('pricing') }}" class="btn btn-primary ms-2">
                <i class="fas fa-plus-circle me-2"></i>Upgrade Plan
            </a>
        </div>
    </div>

    <!-- Current Subscription Status -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-crown me-2 text-warning"></i>Current Subscription
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-star fa-lg text-warning"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1">Standard Plan</h4>
                                    <p class="text-muted mb-0">Great for growing businesses</p>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-check text-success"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Status</small>
                                            <div class="fw-bold">Active</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-dollar-sign text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Monthly Price</small>
                                            <div class="fw-bold">$59.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-calendar text-info"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Next Billing</small>
                                            <div class="fw-bold">Apr 15, 2024</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-sync text-warning"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Auto-Renew</small>
                                            <div class="fw-bold">Enabled</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="bg-gradient-warning text-white rounded-3 p-4">
                                    <h6 class="text-uppercase mb-2">Days Remaining</h6>
                                    <div class="h2 fw-bold mb-0">18</div>
                                    <small>until next billing</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-bolt me-2 text-primary"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-arrow-up me-2"></i>Upgrade Plan
                        </button>
                        <button class="btn btn-outline-warning">
                            <i class="fas fa-pause me-2"></i>Pause Subscription
                        </button>
                        <button class="btn btn-outline-info">
                            <i class="fas fa-credit-card me-2"></i>Update Payment
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-file-invoice me-2"></i>Download Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Usage Statistics -->
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Products</h6>
                            <div class="h3 mb-0 fw-bold">247</div>
                            <small class="opacity-75">of 500 used</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-box fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-white bg-opacity-50" style="width: 49.4%"></div>
                        </div>
                        <small class="opacity-75">49.4% utilized</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-success">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Users</h6>
                            <div class="h3 mb-0 fw-bold">3</div>
                            <small class="opacity-75">of 5 active</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-white bg-opacity-50" style="width: 60%"></div>
                        </div>
                        <small class="opacity-75">60% utilized</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-warning">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Storage</h6>
                            <div class="h3 mb-0 fw-bold">3.2GB</div>
                            <small class="opacity-75">of 10GB used</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-database fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-white bg-opacity-50" style="width: 32%"></div>
                        </div>
                        <small class="opacity-75">32% utilized</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-info">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">API Calls</h6>
                            <div class="h3 mb-0 fw-bold">8.4K</div>
                            <small class="opacity-75">of 10K this month</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-chart-line fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-white bg-opacity-50" style="width: 84%"></div>
                        </div>
                        <small class="opacity-75">84% utilized</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Billing History -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-file-invoice-dollar me-2 text-success"></i>Billing History
                </h5>
                <div>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">All Transactions</a></li>
                            <li><a class="dropdown-item" href="#">Successful Only</a></li>
                            <li><a class="dropdown-item" href="#">Failed Only</a></li>
                            <li><a class="dropdown-item" href="#">Refunds Only</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-sm btn-primary">
                        <i class="fas fa-download me-1"></i>Download All
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-semibold">Mar 15, 2024</div>
                                <small class="text-muted">15:30 PM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Standard Plan - Monthly</div>
                                <small class="text-muted">Subscription renewal</small>
                            </td>
                            <td>
                                <div class="fw-bold text-success">$59.00</div>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Paid
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-credit-card text-muted me-2"></i>
                                    <span>•••• 4242</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="Download Invoice">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-semibold">Feb 15, 2024</div>
                                <small class="text-muted">15:30 PM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Standard Plan - Monthly</div>
                                <small class="text-muted">Subscription renewal</small>
                            </td>
                            <td>
                                <div class="fw-bold text-success">$59.00</div>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Paid
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-credit-card text-muted me-2"></i>
                                    <span>•••• 4242</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="Download Invoice">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-semibold">Jan 15, 2024</div>
                                <small class="text-muted">15:30 PM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Standard Plan - Monthly</div>
                                <small class="text-muted">Subscription renewal</small>
                            </td>
                            <td>
                                <div class="fw-bold text-success">$59.00</div>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Paid
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-credit-card text-muted me-2"></i>
                                    <span>•••• 4242</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="Download Invoice">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-semibold">Jan 1, 2024</div>
                                <small class="text-muted">10:15 AM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Plan Upgrade</div>
                                <small class="text-muted">Basic to Standard</small>
                            </td>
                            <td>
                                <div class="fw-bold text-warning">$30.00</div>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Paid
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-credit-card text-muted me-2"></i>
                                    <span>•••• 4242</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="Download Invoice">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
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
.card {
    transition: transform 0.2s ease-in-out;
}
.card:hover {
    transform: translateY(-2px);
}
.btn-group .btn {
    border-radius: 0;
}
.btn-group .btn:first-child {
    border-top-left-radius: 0.375rem;
    border-bottom-left-radius: 0.375rem;
}
.btn-group .btn:last-child {
    border-top-right-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}
</style>

@endsection
