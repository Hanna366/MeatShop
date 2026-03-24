<?php $__env->startSection('title', 'Create New Tenant - MeatShop POS'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h1 class="h2 mb-0">Create New Tenant</h1>
            <p class="text-muted mb-0">Set up a new tenant account for your POS system</p>
        </div>
        <div>
            <a href="<?php echo e(route('tenants.index')); ?>" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Tenants
            </a>
        </div>
    </div>

    <!-- Creation Form -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-building me-2"></i>Tenant Information
                    </h5>
                </div>
                <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger mb-4">
                            <h6 class="alert-heading">
                                <i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:
                            </h6>
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success mb-4">
                            <h6 class="alert-heading">
                                <i class="fas fa-check-circle me-2"></i>Success!
                            </h6>
                            <p class="mb-0"><?php echo e(session('success')); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('account.store')); ?>" method="POST" id="tenantForm">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row g-4">
                            <!-- Account Information Section -->
                            <div class="col-12">
                                <h6 class="text-uppercase text-primary mb-3">
                                    <i class="fas fa-user me-2"></i>Account Information
                                </h6>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-user me-1"></i>Full Name
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?php echo e(old('name')); ?>" placeholder="Enter full name" required>
                                    </div>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope me-1"></i>Email Address
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="<?php echo e(old('email')); ?>" placeholder="Enter email address" required>
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-lock me-1"></i>Password
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-robot"></i>
                                        </span>
                                        <input type="text" class="form-control" id="password" name="password" 
                                               value="AUTO-GENERATED" readonly placeholder="Password will be auto-generated and emailed">
                                    </div>
                                    <small class="form-text text-info">
                                        <i class="fas fa-info-circle me-1"></i>
                                        A secure password will be automatically generated and sent to your email address.
                                    </small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="fas fa-lock me-1"></i>Confirm Password
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" 
                                               value="SENT VIA EMAIL" readonly placeholder="Password will be sent to your email">
                                    </div>
                                    <small class="form-text text-success">
                                        <i class="fas fa-check-circle me-1"></i>
                                        Check your email after account creation for your login credentials.
                                    </small>
                                </div>
                            </div>

                            <!-- Business Information Section -->
                            <div class="col-12 mt-4">
                                <h6 class="text-uppercase text-success mb-3">
                                    <i class="fas fa-building me-2"></i>Business Information
                                </h6>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="company_name" class="form-label">
                                        <i class="fas fa-building me-1"></i>Business Name
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </span>
                                        <input type="text" class="form-control" id="company_name" name="company_name" 
                                               value="<?php echo e(old('company_name')); ?>" placeholder="Enter business name">
                                    </div>
                                    <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="business_phone" class="form-label">
                                        <i class="fas fa-phone me-1"></i>Phone Number
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="tel" class="form-control" id="business_phone" name="business_phone" 
                                               value="<?php echo e(old('business_phone')); ?>" placeholder="Enter phone number">
                                    </div>
                                    <?php $__errorArgs = ['business_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="business_address" class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i>Business Address
                                    </label>
                                    <textarea class="form-control" id="business_address" name="business_address" 
                                              rows="3" placeholder="Enter complete business address (street, city, state, postal code)"><?php echo e(old('business_address')); ?></textarea>
                                    <small class="form-text text-muted">Include street, city, state, and postal code for accurate location tracking</small>
                                    <?php $__errorArgs = ['business_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="plan" class="form-label">
                                        <i class="fas fa-crown me-1"></i>Subscription Plan
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-crown"></i>
                                        </span>
                                        <select class="form-select" id="plan" name="plan" required>
                                            <option value="">Select a plan</option>
                                            <option value="basic" <?php echo e(old('plan') == 'basic' ? 'selected' : ''); ?>>Basic - Free</option>
                                            <option value="standard" <?php echo e(old('plan') == 'standard' ? 'selected' : ''); ?>>Standard - $29/month</option>
                                            <option value="premium" <?php echo e(old('plan') == 'premium' ? 'selected' : ''); ?>>Premium - $99/month</option>
                                        </select>
                                    </div>
                                    <?php $__errorArgs = ['plan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agreeTerms">
                                <label class="form-check-label" for="agreeTerms">
                                    I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                </label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg me-2" onclick="showLoading()">
                                    <i class="fas fa-plus-circle me-2"></i>Create Tenant
                                </button>
                                <a href="<?php echo e(route('tenants.index')); ?>" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-times-circle me-2"></i>Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Plan Information Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Plan Features
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Basic Plan -->
                    <div class="plan-option mb-3" onclick="selectPlan('basic')">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-primary mb-1">Basic</h6>
                                <div class="h4 text-primary mb-0">Free</div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-primary text-white">Popular</span>
                            </div>
                        </div>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Up to 100 products</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic reporting</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Email support</li>
                            <li class="mb-0"><i class="fas fa-times text-muted me-2"></i>Advanced analytics</li>
                        </ul>
                    </div>

                    <!-- Standard Plan -->
                    <div class="plan-option mb-3" onclick="selectPlan('standard')">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-warning mb-1">Standard</h6>
                                <div class="h4 text-warning mb-0">$29/month</div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-warning text-white">Recommended</span>
                            </div>
                        </div>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Up to 500 products</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced reporting</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority support</li>
                            <li class="mb-0"><i class="fas fa-check text-success me-2"></i>Basic analytics</li>
                        </ul>
                    </div>

                    <!-- Premium Plan -->
                    <div class="plan-option mb-3" onclick="selectPlan('premium')">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-danger mb-1">Premium</h6>
                                <div class="h4 text-danger mb-0">$99/month</div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-danger text-white">Best Value</span>
                            </div>
                        </div>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Unlimited products</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced analytics</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>24/7 phone support</li>
                            <li class="mb-0"><i class="fas fa-check text-success me-2"></i>Custom integrations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.plan-option {
    padding: 1rem;
    border: 2px solid #e9ecef;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}
.plan-option:hover {
    border-color: #007bff;
    background-color: #f8f9fa;
}
.plan-option.selected {
    border-color: #007bff;
    background-color: #e3f2fd;
}
.input-group-text {
    width: 45px;
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    border-right: none;
}
.form-control {
    border-left: none;
}
.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>

<script>
function selectPlan(planName) {
    // Remove selected class from all plan options
    document.querySelectorAll('.plan-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    // Add selected class to clicked plan
    event.currentTarget.classList.add('selected');
    
    // Update the select dropdown
    document.getElementById('plan').value = planName;
    
    // Show SweetAlert notification
    Swal.fire({
        title: '✅ Plan Selected!',
        text: planName.charAt(0).toUpperCase() + planName.slice(1) + ' plan has been selected successfully.',
        icon: 'success',
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
}

function showLoading() {
    // Show SweetAlert loading
    Swal.fire({
        title: 'Creating Tenant...',
        text: 'Please wait while we create your tenant account...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating...';
    button.disabled = true;
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.disabled = false;
        
        // Show success notification
        Swal.fire({
            title: '🎉 Tenant Created Successfully!',
            text: 'Your tenant account has been created. Password has been sent to your email.',
            icon: 'success',
            timer: 5000,
            timerProgressBar: true,
            showConfirmButton: true,
            confirmButtonText: 'Go to Login'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/login';
            }
        });
    }, 2000);
}

// Form validation with SweetAlert
document.getElementById('tenantForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Basic validation
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const plan = document.getElementById('plan').value;
    
    if (!name || !email || !plan) {
        Swal.fire({
            title: '⚠️ Missing Information',
            text: 'Please fill in all required fields before proceeding.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        Swal.fire({
            title: '⚠️ Invalid Email',
            text: 'Please enter a valid email address.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    // Show loading and proceed
    showLoading();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.central', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rusty\Music\MeatShop\resources\views/tenants/create.blade.php ENDPATH**/ ?>