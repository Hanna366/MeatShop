

<?php $__env->startSection('title', 'Tenants - MeatShop POS'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h1 class="h2 mb-0">Tenants</h1>
            <p class="text-muted mb-0">Manage all your tenant accounts</p>
        </div>
        <div>
            <a href="<?php echo e(route('tenants.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Create New Tenant
            </a>
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

    <!-- Tenants Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-building me-2"></i>All Tenants
                </h5>
                <div>
                    <div class="input-group me-2">
                        <input type="text" class="form-control" placeholder="Search tenants..." id="searchInput">
                        <button class="btn btn-outline-secondary" type="button" onclick="searchTenants()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="btn btn-sm btn-outline-primary me-2" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="filterTenants('all')">All Tenants</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTenants('active')">Active Only</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTenants('suspended')">Suspended Only</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTenants('unpaid')">Unpaid Only</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTenants('archived')">Archived Only</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="tenantsTable">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAllTenants">
                                    <label class="form-check-label" for="selectAllTenants"></label>
                                </div>
                            </th>
                            <th>Tenant ID</th>
                            <th>Business Name</th>
                            <th>Contact Information</th>
                            <th>Address</th>
                            <th>Domain</th>
                            <th>Plan</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $tenants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="tenant-index-<?php echo e($tenant->id); ?>">
                                        <label class="form-check-label" for="tenant-index-<?php echo e($tenant->id); ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <code class="text-primary"><?php echo e($tenant->tenant_id); ?></code>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                            <i class="fas fa-building text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold"><?php echo e($tenant->business_name); ?></div>
                                            <small class="text-muted d-block">
                                                <i class="fas fa-globe me-1"></i><?php echo e($tenant->domain ?? 'No domain'); ?>

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
                                            <div class="fw-semibold"><?php echo e($tenant->business_email); ?></div>
                                            <?php if($tenant->business_phone): ?>
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-phone me-1"></i><?php echo e($tenant->business_phone); ?>

                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-semibold"><?php echo e($tenant->business_address ?? 'No address provided'); ?></div>
                                        <?php if($tenant->business_address): ?>
                                            <small class="text-muted d-block">
                                                <i class="fas fa-map-marker-alt me-1"></i>Complete address on file
                                            </small>
                                        <?php else: ?>
                                            <small class="text-muted d-block">
                                                <i class="fas fa-exclamation-triangle me-1 text-warning"></i>No address provided
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if(empty($tenant->domain)): ?>
                                        <span class="text-muted">No domain</span>
                                    <?php else: ?>
                                        <div class="d-flex align-items-center">
                                            <a href="#" onclick="accessTenantDomain('<?php echo e($tenant->domain); ?>', '<?php echo e($tenant->business_name); ?>')" class="text-primary text-decoration-none me-2" title="Access Tenant Login">
                                                <i class="fas fa-external-link-alt me-1"></i><?php echo e($tenant->domain); ?>

                                            </a>
                                            <?php if($tenant->status === 'active'): ?>
                                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">
                                                    <i class="fas fa-check-circle me-1"></i>Accessible
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">
                                                    <i class="fas fa-pause-circle me-1"></i>Inactive
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <small class="text-muted d-block ms-3">
                                            <i class="fas fa-sign-in-alt me-1"></i>Click to access tenant login
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo e($tenant->plan === 'premium' ? 'danger' : ($tenant->plan === 'standard' ? 'warning' : 'primary')); ?> text-white px-3 py-2">
                                        <i class="fas fa-crown me-1"></i><?php echo e(ucfirst($tenant->plan ?? 'basic')); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo e($tenant->status === 'active' ? 'success' : ($tenant->status === 'suspended' ? 'danger' : ($tenant->status === 'archived' ? 'secondary' : 'warning'))); ?> text-white px-3 py-2">
                                        <i class="fas fa-<?php echo e($tenant->status === 'active' ? 'check' : ($tenant->status === 'suspended' ? 'times' : ($tenant->status === 'archived' ? 'archive' : 'question'))); ?>-circle me-1"></i>
                                        <?php echo e(ucfirst($tenant->status ?? 'active')); ?>

                                    </span>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-semibold"><?php echo e($tenant->created_at ? $tenant->created_at->format('M d, Y') : '-'); ?></div>
                                        <small class="text-muted"><?php echo e($tenant->created_at ? $tenant->created_at->diffForHumans() : ''); ?></small>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('tenants.show', $tenant->tenant_id)); ?>" class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('tenants.show', $tenant->tenant_id)); ?>" class="btn btn-sm btn-outline-info" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <?php if(!empty($tenant->domain) && $tenant->status === 'active'): ?>
                                            <button class="btn btn-sm btn-outline-success" title="Access Tenant Login" onclick="accessTenantDomain('<?php echo e($tenant->domain); ?>', '<?php echo e($tenant->business_name); ?>')">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if($tenant->status === 'archived'): ?>
                                            <button class="btn btn-sm btn-outline-success" title="Restore" onclick="confirmRestore('<?php echo e($tenant->tenant_id); ?>')">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-outline-secondary" title="Archive" onclick="confirmArchive('<?php echo e($tenant->tenant_id); ?>')">
                                                <i class="fas fa-archive"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="text-muted">
                                        <div class="mb-3">
                                            <i class="fas fa-building fa-4x text-muted opacity-50"></i>
                                        </div>
                                        <h5 class="text-muted mb-3">No Tenants Found</h5>
                                        <p class="text-muted mb-4">Start by creating your first tenant to begin managing your multi-tenant POS system.</p>
                                        <div>
                                            <a href="<?php echo e(route('tenants.create')); ?>" class="btn btn-primary btn-lg me-2">
                                                <i class="fas fa-plus-circle me-2"></i>Create Your First Tenant
                                            </a>
                                            <a href="<?php echo e(route('pricing')); ?>" class="btn btn-outline-secondary btn-lg">
                                                <i class="fas fa-info-circle me-2"></i>View Plans
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.central', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rusty\Music\MeatShop\resources\views/tenants/index.blade.php ENDPATH**/ ?>