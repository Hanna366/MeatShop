<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Meat Shop POS - <?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .header { background: #2c3e50; color: white; padding: 1rem; }
        .nav { background: #34495e; padding: 0.5rem; }
        .nav a { color: white; text-decoration: none; padding: 0.5rem 1rem; margin: 0 0.25rem; }
        .nav a:hover { background: #2c3e50; }
        .container { max-width: 1200px; margin: 0 auto; padding: 1rem; }
        .card { background: white; border: 1px solid #ddd; margin: 1rem 0; padding: 1rem; }
        .btn { padding: 0.5rem 1rem; border: none; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-primary { background: #3498db; color: white; }
        .btn-secondary { background: #95a5a6; color: white; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 0.5rem; text-align: left; }
        .table th { background: #f8f9fa; }
        .form-group { margin-bottom: 1rem; }
        .form-label { display: block; margin-bottom: 0.25rem; font-weight: bold; }
        .form-control { width: 100%; padding: 0.5rem; border: 1px solid #ddd; }
        .text-danger { color: #e74c3c; }
        .alert { padding: 1rem; margin-bottom: 1rem; border-radius: 4px; }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Meat Shop POS</h1>
        <?php if(session('authenticated')): ?>
            <span>Welcome, <?php echo e(session('user.name')); ?></span>
            <a href="<?php echo e(route('logout')); ?>" class="btn btn-secondary" style="float: right;">Logout</a>
        <?php endif; ?>
    </div>
    
    <?php if(session('authenticated')): ?>
        <div class="nav">
            <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
            <a href="<?php echo e(route('tenants.index')); ?>">Tenants</a>
            <a href="<?php echo e(route('pricing')); ?>">Plans</a>
            <a href="<?php echo e(route('tenants.create')); ?>">Create Tenant</a>
            <a href="<?php echo e(route('subscription.billing')); ?>">Billing</a>
        </div>
    <?php endif; ?>
    
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Rusty\Music\MeatShop\resources\views/layouts/central_simple.blade.php ENDPATH**/ ?>