@extends('layouts.central_simple')

@section('title', 'Create Account - Meat Shop POS')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Modern Header -->
            <div class="text-center mb-5">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="fas fa-store fa-2x"></i>
                </div>
                <h1 class="h2 fw-bold mb-3">Create Your POS Account</h1>
                <p class="text-muted lead">Join thousands of businesses using MeatShop POS for efficient inventory management</p>
            </div>

            <!-- Modern Form Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Progress Steps -->
                    <div class="d-flex justify-content-center mb-5">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="flex-grow-1 px-3">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-primary" style="width: 33%;"></div>
                                </div>
                            </div>
                            <div class="bg-light text-muted rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="flex-grow-1 px-3">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-light" style="width: 0%;"></div>
                                </div>
                            </div>
                            <div class="bg-light text-muted rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-crown"></i>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('account.store') }}" method="POST" id="createAccountForm">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="mb-5">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-user me-2 text-primary"></i>Personal Information
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-user text-muted"></i>
                                            </span>
                                            <input type="text" class="form-control border-start-0" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
                                        </div>
                                        @error('name')
                                            <div class="text-danger mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </span>
                                            <input type="email" class="form-control border-start-0" id="email" name="email" value="{{ old('email') }}" placeholder="your.email@example.com" required>
                                        </div>
                                        @error('email')
                                            <div class="text-danger mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Information Section -->
                        <div class="mb-5">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-building me-2 text-primary"></i>Business Information
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_name" class="form-label fw-semibold">Business Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-store text-muted"></i>
                                            </span>
                                            <input type="text" class="form-control border-start-0" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="Your business name">
                                        </div>
                                        @error('company_name')
                                            <div class="text-danger mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="business_phone" class="form-label fw-semibold">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-phone text-muted"></i>
                                            </span>
                                            <input type="tel" class="form-control border-start-0" id="business_phone" name="business_phone" value="{{ old('business_phone') }}" placeholder="+1 (555) 123-4567">
                                        </div>
                                        @error('business_phone')
                                            <div class="text-danger mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="business_address" class="form-label fw-semibold">Business Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="fas fa-map-marker-alt text-muted"></i>
                                            </span>
                                            <textarea class="form-control border-start-0" id="business_address" name="business_address" rows="2" placeholder="123 Main St, City, State 12345">{{ old('business_address') }}</textarea>
                                        </div>
                                        @error('business_address')
                                            <div class="text-danger mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Plan Selection Section -->
                        <div class="mb-5">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-crown me-2 text-primary"></i>Choose Your Plan
                            </h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border-2 h-100 plan-card" data-plan="basic">
                                        <div class="card-body text-center p-4">
                                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                                <i class="fas fa-rocket fa-lg text-primary"></i>
                                            </div>
                                            <h6 class="fw-bold">Basic</h6>
                                            <div class="h4 fw-bold text-primary mb-2">$29<span class="text-muted fw-normal">/mo</span></div>
                                            <ul class="list-unstyled small text-start mb-4">
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Up to 100 products</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic reporting</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Email support</li>
                                            </ul>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="plan" id="plan_basic" value="basic" checked>
                                                <label class="form-check-label" for="plan_basic">Select Basic</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card border-2 h-100 plan-card" data-plan="standard">
                                        <div class="card-body text-center p-4">
                                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                                <i class="fas fa-star fa-lg text-warning"></i>
                                            </div>
                                            <h6 class="fw-bold">Standard</h6>
                                            <div class="h4 fw-bold text-warning mb-2">$59<span class="text-muted fw-normal">/mo</span></div>
                                            <ul class="list-unstyled small text-start mb-4">
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Up to 500 products</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced reporting</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority support</li>
                                            </ul>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="plan" id="plan_standard" value="standard">
                                                <label class="form-check-label" for="plan_standard">Select Standard</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card border-2 h-100 plan-card" data-plan="premium">
                                        <div class="card-body text-center p-4">
                                            <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                                <i class="fas fa-crown fa-lg text-danger"></i>
                                            </div>
                                            <h6 class="fw-bold">Premium</h6>
                                            <div class="h4 fw-bold text-danger mb-2">$99<span class="text-muted fw-normal">/mo</span></div>
                                            <ul class="list-unstyled small text-start mb-4">
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Unlimited products</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom reports</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>24/7 phone support</li>
                                            </ul>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="plan" id="plan_premium" value="premium">
                                                <label class="form-check-label" for="plan_premium">Select Premium</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Auto-Password Section -->
                        <div class="mb-5">
                            <div class="alert alert-info border-0 bg-info bg-opacity-10">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-25 rounded-circle p-2 me-3">
                                        <i class="fas fa-robot text-info"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">Password Will Be Auto-Generated</h6>
                                        <p class="mb-0 text-muted">A secure password will be automatically generated and sent to your email address after account creation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- reCAPTCHA -->
                        <div class="mb-4">
                            <div class="text-center">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            </div>
                            @error('g-recaptcha-response')
                                <div class="text-danger text-center mt-2"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                <i class="fas fa-rocket me-2"></i>Create Account
                            </button>
                            <p class="text-muted mt-3 mb-0">
                                <small>By creating an account, you agree to our <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a></small>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.plan-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.plan-card.selected {
    border-color: #0d6efd !important;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.input-group-text {
    border-right: none;
}

.form-control.border-start-0 {
    border-left: none;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Plan card selection
    const planCards = document.querySelectorAll('.plan-card');
    const planRadios = document.querySelectorAll('input[name="plan"]');
    
    planCards.forEach(card => {
        card.addEventListener('click', function() {
            const plan = this.dataset.plan;
            const radio = document.getElementById('plan_' + plan);
            
            // Remove selected class from all cards
            planCards.forEach(c => c.classList.remove('selected'));
            
            // Add selected class to clicked card
            this.classList.add('selected');
            
            // Check the radio button
            radio.checked = true;
        });
    });
    
    // Set initial selected state
    const basicRadio = document.getElementById('plan_basic');
    if (basicRadio && basicRadio.checked) {
        document.querySelector('[data-plan="basic"]').classList.add('selected');
    }
    
    // Form validation
    const form = document.getElementById('createAccountForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
        
        // Re-enable after 10 seconds in case of issues
        setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-rocket me-2"></i>Create Account';
        }, 10000);
    });
});
</script>

@endsection