@extends('layouts.central')

@section('title', 'Plan Details - MeatShop POS')

@section('content')
<div class="container-fluid">
    <!-- Modern Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-warning text-white rounded-circle p-3 me-3">
                    <i class="fas fa-star fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">Standard Plan</h1>
                    <p class="text-muted mb-0">Most popular subscription tier</p>
                </div>
            </div>
        </div>
        <div>
            <div class="btn-group">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Plans
                </button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPlanModal">
                    <i class="fas fa-edit me-2"></i>Edit Plan
                </button>
            </div>
        </div>
    </div>

    <!-- Plan Overview Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm bg-gradient-warning">
                <div class="card-body text-white">
                    <div class="text-center">
                        <div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-star fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-2">Standard</h3>
                        <div class="h1 mb-0 fw-bold">$59<span class="text-white-50 fw-normal">/mo</span></div>
                        <p class="mb-0 opacity-75">Monthly billing</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-users text-success"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">128 Subscribers</h6>
                                    <small class="text-muted">Currently active</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-dollar-sign text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">$7,552/mo</h6>
                                    <small class="text-muted">Monthly revenue</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-chart-line text-info"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">+12.5%</h6>
                                    <small class="text-muted">Growth rate</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-clock text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">18 months</h6>
                                    <small class="text-muted">Average retention</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plan Features -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-list-check me-2 text-primary"></i>Plan Features
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Up to 500 Products</div>
                                    <small class="text-muted">Manage up to 500 products in inventory</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Advanced Inventory Management</div>
                                    <small class="text-muted">Batch operations and stock tracking</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Detailed Sales Analytics</div>
                                    <small class="text-muted">Comprehensive reporting dashboard</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Customer Relationship Management</div>
                                    <small class="text-muted">Advanced CRM features</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Priority Email Support</div>
                                    <small class="text-muted">24-hour response time</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Advanced Reporting</div>
                                    <small class="text-muted">Custom reports and insights</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Basic API Access</div>
                                    <small class="text-muted">RESTful API with rate limits</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Subscribers -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-user-plus me-2 text-success"></i>Recent Subscribers
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-store text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Buksu Restaurant</div>
                                <small class="text-muted">Subscribed 2 days ago</small>
                                <div class="text-muted small mt-1">Monthly billing • Active</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-store text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Test Restaurant</div>
                                <small class="text-muted">Subscribed 5 days ago</small>
                                <div class="text-muted small mt-1">Monthly billing • Active</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-store text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">QuickMart</div>
                                <small class="text-muted">Subscribed 1 week ago</small>
                                <div class="text-muted small mt-1">Monthly billing • Active</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-store text-warning"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Food Palace</div>
                                <small class="text-muted">Subscribed 2 weeks ago</small>
                                <div class="text-muted small mt-1">Monthly billing • Trial</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-chart-area me-2 text-info"></i>Revenue Trend
            </h5>
        </div>
        <div class="card-body">
            <canvas id="revenueChart" height="100"></canvas>
        </div>
    </div>
</div>

<!-- Edit Plan Modal -->
<div class="modal fade" id="editPlanModal" tabindex="-1" aria-labelledby="editPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-edit me-2 text-primary"></i>Edit Subscription Plan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPlanForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Plan Name</label>
                                <input type="text" class="form-control" value="Standard" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Monthly Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" value="59" step="0.01" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" rows="2">Great for growing businesses with expanding needs</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select">
                            <option value="active" selected>Active</option>
                            <option value="paused">Paused</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updatePlan()">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-warning {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.card {
    transition: transform 0.2s ease-in-out;
}
.card:hover {
    transform: translateY(-2px);
}
.list-group-item {
    transition: background-color 0.2s ease;
}
.list-group-item:hover {
    background-color: #f8f9fa;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Revenue Chart
const ctx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Monthly Revenue',
            data: [5200, 5800, 6100, 6900, 7200, 7552],
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return '$' + value.toLocaleString();
                    }
                }
            }
        }
    }
});

function updatePlan() {
    const modal = bootstrap.Modal.getInstance(document.getElementById('editPlanModal'));
    modal.hide();
    
    Swal.fire({
        icon: 'success',
        title: 'Plan Updated Successfully!',
        text: 'Your changes have been saved.',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
}
</script>

@endsection
