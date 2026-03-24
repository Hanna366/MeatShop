

<?php $__env->startSection('title', 'MeatShop Central'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h1 class="h2 mb-0">MeatShop Central</h1>
            <p class="text-muted mb-0">Manage your multi-tenant POS system</p>
        </div>
        <div>
            <a href="<?php echo e(route('tenants.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Create New Tenant
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg border-0 bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2">Total Tenants</h6>
                            <div class="h3 mb-0"><?php echo e($stats['total_tenants'] ?? 0); ?></div>
                        </div>
                        <div class="ms-3">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg border-0 bg-gradient-success">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2">Active Tenants</h6>
                            <div class="h3 mb-0"><?php echo e($stats['active_tenants'] ?? 0); ?></div>
                        </div>
                        <div class="ms-3">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg border-0 bg-gradient-warning">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2">Suspended Tenants</h6>
                            <div class="h3 mb-0"><?php echo e($stats['suspended_tenants'] ?? 0); ?></div>
                        </div>
                        <div class="ms-3">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="fas fa-pause-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg border-0 bg-gradient-danger">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2">Unpaid Tenants</h6>
                            <div class="h3 mb-0"><?php echo e($stats['unpaid_tenants'] ?? 0); ?></div>
                        </div>
                        <div class="ms-3">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Tenants Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list me-2"></i>Recent Tenants
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-secondary me-2" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                    <a href="<?php echo e(route('tenants.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-th me-1"></i>View All
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                    <label class="form-check-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th>Business Name</th>
                            <th>Contact</th>
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
                                        <input class="form-check-input" type="checkbox" id="tenant-<?php echo e($tenant->id); ?>">
                                        <label class="form-check-label" for="tenant-<?php echo e($tenant->id); ?>"></label>
                                    </div>
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
                                    <span class="badge bg-<?php echo e($tenant->plan === 'premium' ? 'danger' : ($tenant->plan === 'standard' ? 'warning' : 'primary')); ?> text-white px-3 py-2">
                                        <i class="fas fa-crown me-1"></i><?php echo e(ucfirst($tenant->plan ?? 'basic')); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo e($tenant->status === 'active' ? 'success' : ($tenant->status === 'suspended' ? 'danger' : 'secondary')); ?> text-white px-3 py-2">
                                        <i class="fas fa-<?php echo e($tenant->status === 'active' ? 'check' : ($tenant->status === 'suspended' ? 'times' : 'question')); ?>-circle me-1"></i>
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
                                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete('<?php echo e($tenant->tenant_id); ?>')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted">
                                        <div class="mb-3">
                                            <i class="fas fa-building fa-4x text-muted opacity-50"></i>
                                        </div>
                                        <h5 class="text-muted mb-3">No Tenants Found</h5>
                                        <p class="text-muted mb-4">Get started by creating your first tenant to begin managing your multi-tenant POS system.</p>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.central', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rusty\Music\MeatShop\resources\views/central/home.blade.php ENDPATH**/ ?>