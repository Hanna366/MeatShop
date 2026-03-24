@extends('layouts.central')

@section('title', 'MeatShop Central')

@section('content')
<div class="container-fluid">
    <!-- Modern Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-primary text-white rounded-circle p-3 me-3">
                    <i class="fas fa-tachometer-alt fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">MeatShop Central</h1>
                    <p class="text-muted mb-0">Manage your multi-tenant POS system</p>
                </div>
            </div>
        </div>
        <div>
            <div class="btn-group">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-chart-line me-2"></i>Reports
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-file-pdf me-2"></i>Export PDF Report</a></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-file-excel me-2"></i>Export Excel Report</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-cog me-2"></i>Report Settings</a></li>
                </ul>
            </div>
            <a href="{{ route('tenants.create') }}" class="btn btn-primary ms-2">
                <i class="fas fa-plus-circle me-2"></i>Create New Tenant
            </a>
        </div>
    </div>

    <!-- Enhanced Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Total Tenants</h6>
                            <div class="h3 mb-0 fw-bold">{{ $stats['total_tenants'] ?? 0 }}</div>
                            <small class="opacity-75">All registered tenants</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-building fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-white bg-opacity-50" style="width: 75%"></div>
                        </div>
                        <small class="opacity-75">75% of capacity</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-success">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Active Tenants</h6>
                            <div class="h3 mb-0 fw-bold">{{ $stats['active_tenants'] ?? 0 }}</div>
                            <small class="opacity-75">Currently active</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-check-circle fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-white bg-opacity-50" style="width: {{ $stats['active_tenants'] > 0 ? ($stats['active_tenants'] / ($stats['total_tenants'] ?: 1) * 100) : 0 }}%"></div>
                        </div>
                        <small class="opacity-75">{{ $stats['total_tenants'] > 0 ? round(($stats['active_tenants'] / $stats['total_tenants']) * 100) : 0 }}% active rate</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-warning">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">New This Month</h6>
                            <div class="h3 mb-0 fw-bold">{{ $stats['new_tenants'] ?? 0 }}</div>
                            <small class="opacity-75">Recently added</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-user-plus fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex align-items-center">
                            <small class="opacity-75 me-2">Growth:</small>
                            <small class="fw-bold">+{{ $stats['new_tenants_growth'] ?? 0 }}%</small>
                            <i class="fas fa-arrow-up ms-1"></i>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Revenue</h6>
                            <div class="h3 mb-0 fw-bold">${{ number_format($stats['monthly_revenue'] ?? 0) }}</div>
                            <small class="opacity-75">This month</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-dollar-sign fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex align-items-center">
                            <small class="opacity-75 me-2">vs last month:</small>
                            <small class="fw-bold">+{{ $stats['revenue_growth'] ?? 0 }}%</small>
                            <i class="fas fa-arrow-up ms-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Tenants Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-users me-2 text-primary"></i>Recent Tenants
                </h5>
                <div>
                    <div class="btn-group me-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-check-circle me-2 text-success"></i>Active Only</a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-pause-circle me-2 text-warning"></i>Suspended Only</a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-crown me-2 text-danger"></i>Premium Only</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-globe me-2"></i>All Tenants</a></li>
                        </ul>
                    </div>
                    <a href="{{ route('tenants.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-th me-1"></i>View All
                    </a>
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
                            <th>Business</th>
                            <th>Contact</th>
                            <th width="100">Plan</th>
                            <th width="100">Status</th>
                            <th width="120">Created</th>
                            <th width="120" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tenants as $tenant)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="tenant-{{ $tenant->id }}">
                                        <label class="form-check-label" for="tenant-{{ $tenant->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                            <i class="fas fa-building text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $tenant->business_name }}</div>
                                            <small class="text-muted d-block">
                                                <i class="fas fa-globe me-1"></i>{{ $tenant->domain ?? 'No domain' }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-success bg-opacity-10 p-2 me-3">
                                            <i class="fas fa-envelope text-success"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $tenant->business_email }}</div>
                                            @if($tenant->business_phone)
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-phone me-1"></i>{{ $tenant->business_phone }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $tenant->plan === 'premium' ? 'danger' : ($tenant->plan === 'standard' ? 'warning' : 'primary') }} text-white px-3 py-2">
                                        <i class="fas fa-crown me-1"></i>{{ ucfirst($tenant->plan ?? 'basic') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $tenant->status === 'active' ? 'success' : ($tenant->status === 'suspended' ? 'danger' : 'secondary') }} text-white px-3 py-2">
                                        <i class="fas fa-{{ $tenant->status === 'active' ? 'check' : ($tenant->status === 'suspended' ? 'times' : 'question') }}-circle me-1"></i>
                                        {{ ucfirst($tenant->status ?? 'active') }}
                                    </span>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-semibold">{{ $tenant->created_at ? $tenant->created_at->format('M d, Y') : '-' }}</div>
                                        <small class="text-muted">{{ $tenant->created_at ? $tenant->created_at->diffForHumans() : '' }}</small>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('tenants.show', $tenant->tenant_id) }}" class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('tenants.show', $tenant->tenant_id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete('{{ $tenant->tenant_id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted">
                                        <div class="mb-3">
                                            <i class="fas fa-building fa-4x text-muted opacity-50"></i>
                                        </div>
                                        <h5 class="text-muted mb-3">No Tenants Found</h5>
                                        <p class="text-muted mb-4">Get started by creating your first tenant to begin managing your multi-tenant POS system.</p>
                                        <div>
                                            <a href="{{ route('tenants.create') }}" class="btn btn-primary btn-lg me-2">
                                                <i class="fas fa-plus-circle me-2"></i>Create Your First Tenant
                                            </a>
                                            <a href="{{ route('pricing') }}" class="btn btn-outline-secondary btn-lg">
                                                <i class="fas fa-info-circle me-2"></i>View Plans
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Additional Dashboard Sections -->
    <div class="row g-4 mt-4">
        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-bolt me-2 text-warning"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('tenants.create') }}" class="btn btn-outline-primary">
                            <i class="fas fa-plus-circle me-2"></i>Create New Tenant
                        </a>
                        <a href="{{ route('pricing') }}" class="btn btn-outline-success">
                            <i class="fas fa-crown me-2"></i>View Pricing Plans
                        </a>
                        <a href="#" class="btn btn-outline-info">
                            <i class="fas fa-chart-bar me-2"></i>Generate Reports
                        </a>
                        <a href="#" class="btn btn-outline-warning">
                            <i class="fas fa-cog me-2"></i>System Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-history me-2 text-info"></i>Recent Activity
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        @forelse($recent_activities ?? [] as $activity)
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-{{ $activity['type'] === 'success' ? 'success' : ($activity['type'] === 'warning' ? 'warning' : 'info') }} bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-{{ $activity['icon'] }} text-{{ $activity['type'] === 'success' ? 'success' : ($activity['type'] === 'warning' ? 'warning' : 'info') }}"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">{{ $activity['title'] }}</div>
                                    <small class="text-muted">{{ $activity['description'] }}</small>
                                    <div class="text-muted small mt-1">{{ $activity['time'] }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="fas fa-history fa-3x text-muted opacity-50 mb-3"></i>
                                <p class="text-muted">No recent activity</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-server me-2 text-success"></i>System Status
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="fas fa-database text-success"></i>
                                </div>
                                <h6 class="fw-bold">Database</h6>
                                <span class="badge bg-success">Online</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="fas fa-envelope text-success"></i>
                                </div>
                                <h6 class="fw-bold">Email</h6>
                                <span class="badge bg-success">Connected</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="fas fa-hdd text-warning"></i>
                                </div>
                                <h6 class="fw-bold">Storage</h6>
                                <span class="badge bg-warning">68% Used</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="fas fa-memory text-info"></i>
                                </div>
                                <h6 class="fw-bold">Memory</h6>
                                <span class="badge bg-info">45% Used</span>
                            </div>
                        </div>
                    </div>
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
.bg-gradient-danger {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}
.table th {
    border-top: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
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
function confirmDelete(tenantId) {
    if (confirm('Are you sure you want to delete this tenant? This action cannot be undone.')) {
        // Handle delete action
        console.log('Delete tenant:', tenantId);
    }
}

document.getElementById('selectAll')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});
</script>
@endsection
