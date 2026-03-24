

<?php $__env->startSection('title', 'Pricing Plans - MeatShop POS'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Modern Header -->
    <div class="text-center mb-5">
        <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="fas fa-crown fa-2x"></i>
        </div>
        <h1 class="h1 fw-bold mb-3">Choose Your Perfect Plan</h1>
        <p class="text-muted lead">Flexible pricing options for businesses of all sizes</p>
    </div>

    <!-- Pricing Cards -->
    <div class="row g-4 mb-5">
        <!-- Basic Plan -->
        <div class="col-lg-4">
            <div class="card border-2 h-100 pricing-card">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-rocket fa-lg text-primary"></i>
                    </div>
                    <h4 class="fw-bold">Basic</h4>
                    <div class="h2 fw-bold text-primary mb-3">$29<span class="text-muted fw-normal">/mo</span></div>
                    <p class="text-muted mb-4">Perfect for small businesses just getting started</p>
                    
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Up to 100 products</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Basic inventory tracking</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Sales reporting</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Customer management</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Email support</li>
                        <li class="mb-3 text-muted"><i class="fas fa-times text-muted me-2"></i>Advanced analytics</li>
                        <li class="mb-3 text-muted"><i class="fas fa-times text-muted me-2"></i>API access</li>
                        <li class="mb-3 text-muted"><i class="fas fa-times text-muted me-2"></i>Priority support</li>
                    </ul>
                    
                    <div class="d-grid">
                        <a href="<?php echo e(route('account.create')); ?>?plan=basic" class="btn btn-outline-primary btn-lg">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Standard Plan -->
        <div class="col-lg-4">
            <div class="card border-2 h-100 pricing-card popular">
                <div class="position-relative">
                    <div class="bg-warning text-white text-center py-1 rounded-top">
                        <small class="fw-bold">MOST POPULAR</small>
                    </div>
                </div>
                <div class="card-body p-4 text-center">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-star fa-lg text-warning"></i>
                    </div>
                    <h4 class="fw-bold">Standard</h4>
                    <div class="h2 fw-bold text-warning mb-3">$59<span class="text-muted fw-normal">/mo</span></div>
                    <p class="text-muted mb-4">Great for growing businesses with expanding needs</p>
                    
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Up to 500 products</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Advanced inventory management</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Detailed sales analytics</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Customer relationship management</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Priority email support</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Advanced reporting</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Basic API access</li>
                        <li class="mb-3 text-muted"><i class="fas fa-times text-muted me-2"></i>24/7 phone support</li>
                    </ul>
                    
                    <div class="d-grid">
                        <a href="<?php echo e(route('account.create')); ?>?plan=standard" class="btn btn-warning btn-lg">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium Plan -->
        <div class="col-lg-4">
            <div class="card border-2 h-100 pricing-card">
                <div class="card-body p-4 text-center">
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-crown fa-lg text-danger"></i>
                    </div>
                    <h4 class="fw-bold">Premium</h4>
                    <div class="h2 fw-bold text-danger mb-3">$99<span class="text-muted fw-normal">/mo</span></div>
                    <p class="text-muted mb-4">Complete solution for large businesses and enterprises</p>
                    
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Unlimited products</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Enterprise inventory system</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Custom analytics dashboard</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Advanced CRM features</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>24/7 priority support</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Custom reporting</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Full API access</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Dedicated account manager</li>
                    </ul>
                    
                    <div class="d-grid">
                        <a href="<?php echo e(route('account.create')); ?>?plan=premium" class="btn btn-danger btn-lg">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Comparison -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-white border-bottom-0">
            <h3 class="fw-bold text-center mb-0">Feature Comparison</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Feature</th>
                            <th class="text-center">Basic</th>
                            <th class="text-center">Standard</th>
                            <th class="text-center">Premium</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Products</strong></td>
                            <td class="text-center">100</td>
                            <td class="text-center">500</td>
                            <td class="text-center">Unlimited</td>
                        </tr>
                        <tr>
                            <td><strong>Inventory Management</strong></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td><strong>Sales Analytics</strong></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td><strong>Advanced Reporting</strong></td>
                            <td class="text-center"><i class="fas fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td><strong>API Access</strong></td>
                            <td class="text-center"><i class="fas fa-times text-muted"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td><strong>Support</strong></td>
                            <td class="text-center">Email</td>
                            <td class="text-center">Priority Email</td>
                            <td class="text-center">24/7 Phone</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-4">
                <h3 class="fw-bold">Frequently Asked Questions</h3>
                <p class="text-muted">Everything you need to know about our pricing</p>
            </div>
            
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Can I change my plan later?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes! You can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Is there a free trial?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes! All plans come with a 14-day free trial. No credit card required to start your trial.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            What payment methods do you accept?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We accept all major credit cards, PayPal, and bank transfers for annual subscriptions.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center">
        <div class="bg-gradient-primary text-white rounded-3 p-5">
            <h3 class="fw-bold mb-3">Ready to get started?</h3>
            <p class="mb-4">Join thousands of businesses using MeatShop POS today</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="<?php echo e(route('account.create')); ?>" class="btn btn-light btn-lg">
                    <i class="fas fa-rocket me-2"></i>Start Free Trial
                </a>
                <a href="/tenants" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-info-circle me-2"></i>Learn More
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.pricing-card {
    transition: all 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.pricing-card.popular {
    border-color: #ffc107 !important;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}

.accordion-button:not(.collapsed) {
    background-color: #f8f9fa;
    font-weight: 600;
}

.accordion-item {
    border-radius: 0.5rem !important;
}
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.central_simple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rusty\Music\MeatShop\resources\views/pricing.blade.php ENDPATH**/ ?>