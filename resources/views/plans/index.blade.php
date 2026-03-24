@extends('layouts.central')

@section('title', 'Subscription Plans - MeatShop POS')

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
                    <h1 class="h2 mb-0 fw-bold">Subscription Plans</h1>
                    <p class="text-muted mb-0">Manage pricing tiers and subscription options</p>
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
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-file-csv me-2"></i>Export CSV</a></li>
                </ul>
            </div>
            <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#createPlanModal">
                <i class="fas fa-plus-circle me-2"></i>Create New Plan
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Total Plans</h6>
                            <div class="h3 mb-0 fw-bold">3</div>
                            <small class="opacity-75">Active subscription plans</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-layer-group fa-lg"></i>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Active Subscriptions</h6>
                            <div class="h3 mb-0 fw-bold">{{ $stats['active_subscriptions'] ?? 0 }}</div>
                            <small class="opacity-75">Currently active</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-check-circle fa-lg"></i>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Monthly Revenue</h6>
                            <div class="h3 mb-0 fw-bold">${{ number_format($stats['monthly_revenue'] ?? 0) }}</div>
                            <small class="opacity-75">From subscriptions</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-dollar-sign fa-lg"></i>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Conversion Rate</h6>
                            <div class="h3 mb-0 fw-bold">68%</div>
                            <small class="opacity-75">Trial to paid</small>
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
    </div>

    <!-- Plans Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-list me-2 text-primary"></i>All Subscription Plans
                </h5>
                <div class="d-flex align-items-center">
                    <div class="input-group me-3" style="width: 300px;">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search plans..." id="searchInput">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-globe me-2"></i>All Plans</a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-check-circle me-2 text-success"></i>Active Only</a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-pause-circle me-2 text-warning"></i>Paused Only</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="40">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                    <label class="form-check-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Billing</th>
                            <th>Features</th>
                            <th>Subscribers</th>
                            <th>Status</th>
                            <th width="120" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Basic Plan -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="plan-basic">
                                    <label class="form-check-label" for="plan-basic"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="fas fa-rocket text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Basic</div>
                                        <small class="text-muted">Starter package</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-primary">$29</div>
                                </td>
                            <td>
                                <span class="badge bg-light text-dark">Monthly</span>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-light text-dark small">100 Products</span>
                                    <span class="badge bg-light text-dark small">Basic Support</span>
                                    <span class="badge bg-light text-dark small">+3</span>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold">45</div>
                                <small class="text-muted">active</small>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Edit Plan">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Standard Plan -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="plan-standard">
                                    <label class="form-check-label" for="plan-standard"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Standard</div>
                                        <small class="text-muted">Most popular</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-warning">$59</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">Monthly</span>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-light text-dark small">500 Products</span>
                                    <span class="badge bg-light text-dark small">Priority Support</span>
                                    <span class="badge bg-light text-dark small">+6</span>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold">128</div>
                                <small class="text-muted">active</small>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Edit Plan">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Premium Plan -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="plan-premium">
                                    <label class="form-check-label" for="plan-premium"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="fas fa-crown text-danger"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Premium</div>
                                        <small class="text-muted">Enterprise solution</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-danger">$99</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">Monthly</span>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-light text-dark small">Unlimited</span>
                                    <span class="badge bg-light text-dark small">24/7 Support</span>
                                    <span class="badge bg-light text-dark small">+10</span>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold">67</div>
                                <small class="text-muted">active</small>
                            </td>
                            <td>
                                <span class="badge bg-success text-white px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Edit Plan">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Plan Modal -->
    <div class="modal fade" id="createPlanModal" tabindex="-1" aria-labelledby="createPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>Create New Subscription Plan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createPlanForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Plan Name</label>
                                    <input type="text" class="form-control" placeholder="Enter plan name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Monthly Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="0.00" step="0.01" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Billing Cycle</label>
                                    <select class="form-select">
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Plan Icon</label>
                                    <select class="form-select">
                                        <option value="rocket">🚀 Rocket</option>
                                        <option value="star">⭐ Star</option>
                                        <option value="crown">👑 Crown</option>
                                        <option value="gem">💎 Gem</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" rows="2" placeholder="Brief description of the plan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Features</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="feature1">
                                        <label class="form-check-label" for="feature1">Unlimited Products</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="feature2">
                                        <label class="form-check-label" for="feature2">Priority Support</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="feature3">
                                        <label class="form-check-label" for="feature3">Advanced Analytics</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="feature4">
                                        <label class="form-check-label" for="feature4">API Access</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="feature5">
                                        <label class="form-check-label" for="feature5">Custom Reports</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="feature6">
                                        <label class="form-check-label" for="feature6">White Label</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createPlan()">
                        <i class="fas fa-plus-circle me-2"></i>Create Plan
                    </button>
                </div>
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

<script>
function createPlan() {
    // Handle plan creation
    const modal = bootstrap.Modal.getInstance(document.getElementById('createPlanModal'));
    modal.hide();
    
    // Show success message
    Swal.fire({
        icon: 'success',
        title: 'Plan Created Successfully!',
        text: 'Your new subscription plan has been created.',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
}

document.getElementById('selectAll')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Search functionality
document.getElementById('searchInput')?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});
</script>

@endsection
