@extends('layouts.central')

@section('title', 'Tenants - MeatShop POS')

@section('content')
<div class="container-fluid">
    <!-- Modern Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-primary text-white rounded-circle p-3 me-3">
                    <i class="fas fa-building fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">Tenants</h1>
                    <p class="text-muted mb-0">Manage all your tenant accounts</p>
                </div>
            </div>
        </div>
        <div>
            <div class="btn-group">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-filter me-2"></i>Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="filterTenants('all')">
                        <i class="fas fa-globe me-2"></i>All Tenants</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterTenants('active')">
                        <i class="fas fa-check-circle me-2 text-success"></i>Active</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterTenants('suspended')">
                        <i class="fas fa-pause-circle me-2 text-warning"></i>Suspended</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterTenants('archived')">
                        <i class="fas fa-archive me-2 text-secondary"></i>Archived</a></li>
                </ul>
            </div>
            <a href="{{ route('tenants.create') }}" class="btn btn-primary ms-2">
                <i class="fas fa-plus-circle me-2"></i>Create New Tenant
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Total Tenants</h6>
                            <div class="h3 mb-0 fw-bold">{{ $tenants->count() }}</div>
                            <small class="opacity-75">All registered tenants</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-building fa-lg"></i>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Active</h6>
                            <div class="h3 mb-0 fw-bold">{{ $tenants->where('status', 'active')->count() }}</div>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Suspended</h6>
                            <div class="h3 mb-0 fw-bold">{{ $tenants->where('status', 'suspended')->count() }}</div>
                            <small class="opacity-75">Temporarily suspended</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-pause-circle fa-lg"></i>
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
                            <h6 class="text-uppercase mb-2 fw-bold">Premium</h6>
                            <div class="h3 mb-0 fw-bold">{{ $tenants->where('plan', 'premium')->count() }}</div>
                            <small class="opacity-75">Premium plan users</small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-crown fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions Bar -->
    <div class="card shadow-lg mt-4" id="bulkActionsBar" style="display: none;">
        <div class="card-body bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge bg-primary me-2" id="selectedCount">0 selected</span>
                    <span class="text-muted">Bulk Actions:</span>
                </div>
                <div class="btn-group">
                    <button class="btn btn-sm btn-success" onclick="performBulkAction('activate')">
                        <i class="fas fa-check-circle me-1"></i>Activate
                    </button>
                    <button class="btn btn-sm btn-warning" onclick="performBulkAction('suspend')">
                        <i class="fas fa-pause-circle me-1"></i>Suspend
                    </button>
                    <button class="btn btn-sm btn-secondary" onclick="performBulkAction('archive')">
                        <i class="fas fa-archive me-1"></i>Archive
                    </button>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="exportData('csv')">Export as CSV</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportData('excel')">Export as Excel</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportData('pdf')">Export as PDF</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Tenants Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">All Tenants</h5>
                <div class="d-flex align-items-center">
                    <div class="input-group me-3" style="width: 300px;">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search tenants..." id="searchInput">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-download me-1"></i>Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="exportData('csv')">
                                <i class="fas fa-file-csv me-2"></i>Export as CSV</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportData('excel')">
                                <i class="fas fa-file-excel me-2"></i>Export as Excel</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportData('pdf')">
                                <i class="fas fa-file-pdf me-2"></i>Export as PDF</a></li>
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
                            <th width="120">Tenant ID</th>
                            <th>Business</th>
                            <th>Contact</th>
                            <th width="200">Domain</th>
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
                                        <input class="form-check-input" type="checkbox" id="tenant-index-{{ $tenant->id }}">
                                        <label class="form-check-label" for="tenant-index-{{ $tenant->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <code class="text-primary">{{ $tenant->tenant_id }}</code>
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
                                    <div>
                                        <div class="fw-semibold">{{ $tenant->business_address ?? 'No address provided' }}</div>
                                        @if($tenant->business_address)
                                            <small class="text-muted d-block">
                                                <i class="fas fa-map-marker-alt me-1"></i>Complete address on file
                                            </small>
                                        @else
                                            <small class="text-muted d-block">
                                                <i class="fas fa-exclamation-triangle me-1 text-warning"></i>No address provided
                                            </small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if(empty($tenant->domain))
                                        <span class="text-muted">No domain</span>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <a href="#" onclick="accessTenantDomain('{{ $tenant->domain }}', '{{ $tenant->business_name }}')" class="text-primary text-decoration-none me-2" title="Access Tenant Login">
                                                <i class="fas fa-external-link-alt me-1"></i>{{ $tenant->domain }}
                                            </a>
                                            @if($tenant->status === 'active')
                                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">
                                                    <i class="fas fa-check-circle me-1"></i>Accessible
                                                </span>
                                            @else
                                                <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">
                                                    <i class="fas fa-pause-circle me-1"></i>Inactive
                                                </span>
                                            @endif
                                        </div>
                                        <small class="text-muted d-block ms-3">
                                            <i class="fas fa-sign-in-alt me-1"></i>Click to access tenant login
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $tenant->plan === 'premium' ? 'danger' : ($tenant->plan === 'standard' ? 'warning' : 'primary') }} text-white px-3 py-2">
                                        <i class="fas fa-crown me-1"></i>{{ ucfirst($tenant->plan ?? 'basic') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $tenant->status === 'active' ? 'success' : ($tenant->status === 'suspended' ? 'danger' : ($tenant->status === 'archived' ? 'secondary' : 'warning')) }} text-white px-3 py-2">
                                        <i class="fas fa-{{ $tenant->status === 'active' ? 'check' : ($tenant->status === 'suspended' ? 'times' : ($tenant->status === 'archived' ? 'archive' : 'question')) }}-circle me-1"></i>
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
                                        @if(!empty($tenant->domain) && $tenant->status === 'active')
                                            <button class="btn btn-sm btn-outline-success" title="Access Tenant Login" onclick="accessTenantDomain('{{ $tenant->domain }}', '{{ $tenant->business_name }}')">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </button>
                                        @endif
                                        @if($tenant->status === 'archived')
                                            <button class="btn btn-sm btn-outline-success" title="Restore" onclick="confirmRestore('{{ $tenant->tenant_id }}')">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-outline-secondary" title="Archive" onclick="confirmArchive('{{ $tenant->tenant_id }}')">
                                                <i class="fas fa-archive"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="text-muted">
                                        <div class="mb-3">
                                            <i class="fas fa-building fa-4x text-muted opacity-50"></i>
                                        </div>
                                        <h5 class="text-muted mb-3">No Tenants Found</h5>
                                        <p class="text-muted mb-4">Start by creating your first tenant to begin managing your multi-tenant POS system.</p>
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
</div>

<style>
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
function archiveTenant(tenantId, tenantName) {
    Swal.fire({
        title: 'Archive Tenant?',
        html: 'Are you sure you want to archive <strong>' + tenantName + '</strong>?<br><br><small class="text-info">The tenant will be deactivated and data preserved. You can restore it later if needed.</small>',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#6c757d',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Archive',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Archiving...',
                text: 'Please wait while we archive the tenant...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Simulate archiving (in real app, this would be an AJAX call)
            setTimeout(() => {
                Swal.fire({
                    title: '✅ Archived!',
                    text: 'Tenant "' + tenantName + '" has been archived successfully.',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
                    window.location.reload();
                });
            }, 1500);
        }
    });
}

function confirmArchive(tenantId) {
    const tenantName = document.querySelector(`tr:has([value="${tenantId}"]) .fw-semibold`).textContent;
    archiveTenant(tenantId, tenantName);
}

function restoreTenant(tenantId, tenantName) {
    Swal.fire({
        title: 'Restore Tenant?',
        html: 'Are you sure you want to restore <strong>' + tenantName + '</strong>?<br><br><small class="text-success">The tenant will be reactivated and made accessible again.</small>',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Restore',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Restoring...',
                text: 'Please wait while we restore the tenant...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Simulate restoration (in real app, this would be an AJAX call)
            setTimeout(() => {
                Swal.fire({
                    title: '✅ Restored!',
                    text: 'Tenant "' + tenantName + '" has been restored successfully.',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
                    window.location.reload();
                });
            }, 1500);
        }
    });
}

function confirmRestore(tenantId) {
    const tenantName = document.querySelector(`tr:has([value="${tenantId}"]) .fw-semibold`).textContent;
    restoreTenant(tenantId, tenantName);
}

// Access tenant domain
function accessTenantDomain(domain, tenantName) {
    Swal.fire({
        title: 'Access Tenant Login?',
        html: 'You are about to access the login page for <strong>' + tenantName + '</strong>.<br><br>Domain: <code>' + domain + '</code><br><br><small class="text-info">This will open the tenant\'s login page in a new tab.</small>',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Access Login',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Opening Tenant Login...',
                text: 'Please wait while we open the tenant login page...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Open tenant login in new tab
            setTimeout(() => {
                window.open('http://' + domain + ':8000/login', '_blank');
                
                Swal.fire({
                    title: '✅ Login Page Opened!',
                    text: 'The tenant login page has been opened in a new tab.',
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }, 1000);
        }
    });
}

function searchTenants() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#tenantsTable tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
}

function filterTenants(status) {
    const rows = document.querySelectorAll('#tenantsTable tbody tr');
    
    rows.forEach(row => {
        if (status === 'all') {
            row.style.display = '';
        } else {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(status) ? '' : 'none';
        }
    });
}

// Bulk actions
function performBulkAction(action) {
    const selectedTenants = [];
    document.querySelectorAll('.form-check-input:checked').forEach(checkbox => {
        if (checkbox.id !== 'selectAllTenants') {
            selectedTenants.push(checkbox.value);
        }
    });
    
    if (selectedTenants.length === 0) {
        Swal.fire({
            title: 'No Tenants Selected',
            text: 'Please select at least one tenant to perform this action.',
            icon: 'warning',
            timer: 3000
        });
        return;
    }
    
    let title, message, confirmText, icon;
    
    switch(action) {
        case 'activate':
            title = 'Activate Selected Tenants?';
            message = `Are you sure you want to activate ${selectedTenants.length} tenant(s)?`;
            confirmText = 'Yes, Activate';
            icon = 'question';
            break;
        case 'suspend':
            title = 'Suspend Selected Tenants?';
            message = `Are you sure you want to suspend ${selectedTenants.length} tenant(s)?`;
            confirmText = 'Yes, Suspend';
            icon = 'warning';
            break;
        case 'archive':
            title = 'Archive Selected Tenants?';
            message = `Are you sure you want to archive ${selectedTenants.length} tenant(s)?<br><br><small class="text-info">The tenants will be deactivated and data preserved. You can restore them later if needed.</small>`;
            confirmText = 'Yes, Archive';
            icon = 'question';
            break;
        default:
            return;
    }
    
    Swal.fire({
        title: title,
        html: message,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#6c757d',
        cancelButtonColor: '#6c757d',
        confirmButtonText: confirmText,
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we process your request...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Simulate bulk action (in real app, this would be an AJAX call)
            setTimeout(() => {
                const actionText = action.charAt(0).toUpperCase() + action.slice(1);
                Swal.fire({
                    title: '✅ ' + actionText + 'd!',
                    text: `${selectedTenants.length} tenant(s) have been ${action}d successfully.`,
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
                    window.location.reload();
                });
            }, 2000);
        }
    });
}

// Export data
function exportData(format) {
    Swal.fire({
        title: 'Exporting Data...',
        text: 'Please wait while we prepare your export...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Simulate export (in real app, this would trigger actual export)
    setTimeout(() => {
        Swal.fire({
            title: '✅ Export Complete!',
            text: `Tenant data has been exported as ${format.toUpperCase()} successfully.`,
            icon: 'success',
            timer: 3000,
            timerProgressBar: true
        });
    }, 1500);
}

document.getElementById('selectAllTenants')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActionsBar();
});

// Update bulk actions bar visibility
function updateBulkActionsBar() {
    const checkedBoxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
    const bulkActionsBar = document.getElementById('bulkActionsBar');
    const selectedCount = document.getElementById('selectedCount');
    
    if (checkedBoxes.length > 0) {
        bulkActionsBar.style.display = 'block';
        selectedCount.textContent = checkedBoxes.length + ' selected';
    } else {
        bulkActionsBar.style.display = 'none';
    }
}

// Add event listeners to all checkboxes
document.querySelectorAll('tbody input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActionsBar);
});
</script>
@endsection
