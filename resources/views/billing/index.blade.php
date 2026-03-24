@extends('layouts.central')

@section('title', 'Billing Details - MeatShop POS')

@section('content')
<div class="container-fluid">
    <!-- Modern Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-success text-white rounded-circle p-3 me-3">
                    <i class="fas fa-file-invoice-dollar fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">Billing Details</h1>
                    <p class="text-muted mb-0">Manage payment methods and billing information</p>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('subscription.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Subscription
            </a>
        </div>
    </div>

    <!-- Payment Methods -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-credit-card me-2 text-primary"></i>Payment Methods
                        </h5>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                            <i class="fas fa-plus me-2"></i>Add Payment Method
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="payment-methods">
                        <!-- Credit Card -->
                        <div class="payment-method-item border rounded p-3 mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="fas fa-credit-card text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Visa •••• 4242</div>
                                        <small class="text-muted">Expires 12/2024 • Default</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success me-2">Default</span>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PayPal -->
                        <div class="payment-method-item border rounded p-3 mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="fab fa-paypal text-info"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">PayPal</div>
                                        <small class="text-muted">john.doe@example.com</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GCash -->
                        <div class="payment-method-item border rounded p-3 mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="fas fa-mobile-alt text-success"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">GCash</div>
                                        <small class="text-muted">0912-345-6789</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing Summary -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-chart-pie me-2 text-warning"></i>Billing Summary
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="bg-gradient-success text-white rounded-3 p-4">
                            <h6 class="text-uppercase mb-2">Current Month</h6>
                            <div class="h2 fw-bold mb-0">$59.00</div>
                            <small>Standard Plan</small>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Base Price</span>
                            <span class="fw-bold">$59.00</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Tax</span>
                            <span class="fw-bold">$5.90</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Discount</span>
                            <span class="fw-bold text-success">-$10.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Total</span>
                            <span class="h5 fw-bold text-success">$54.90</span>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100 mb-2">
                            <i class="fas fa-file-pdf me-2"></i>Download Invoice
                        </button>
                        <button class="btn btn-outline-secondary w-100">
                            <i class="fas fa-receipt me-2"></i>View Receipt
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Billing Address -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-map-marker-alt me-2 text-info"></i>Billing Address
                        </h5>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                            <i class="fas fa-edit me-2"></i>Edit
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="address-display">
                        <div class="fw-bold mb-2">John Doe</div>
                        <div class="text-muted">
                            123 Main Street<br>
                            Quezon City, Metro Manila<br>
                            Philippines 1100<br>
                            <i class="fas fa-phone me-2"></i>+63 912 345 6789<br>
                            <i class="fas fa-envelope me-2"></i>john.doe@example.com
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tax Information -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-file-invoice me-2 text-warning"></i>Tax Information
                        </h5>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editTaxModal">
                            <i class="fas fa-edit me-2"></i>Edit
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tax-info">
                        <div class="mb-3">
                            <label class="text-muted small">Tax ID</label>
                            <div class="fw-bold">123-456-789-000</div>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">Business Type</label>
                            <div class="fw-bold">Individual</div>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">Tax Exempt</label>
                            <div class="badge bg-warning">No</div>
                        </div>
                        <div>
                            <label class="text-muted small">VAT Rate</label>
                            <div class="fw-bold">12%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Invoices -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-calendar-alt me-2 text-primary"></i>Upcoming Invoices
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Invoice Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-semibold">Apr 15, 2024</div>
                                <small class="text-muted">In 18 days</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Standard Plan - Monthly</div>
                                <small class="text-muted">Auto-renewal</small>
                            </td>
                            <td>
                                <div class="fw-bold">$59.00</div>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-semibold">May 15, 2024</div>
                                <small class="text-muted">In 48 days</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Standard Plan - Monthly</div>
                                <small class="text-muted">Auto-renewal</small>
                            </td>
                            <td>
                                <div class="fw-bold">$59.00</div>
                            </td>
                            <td>
                                <span class="badge bg-secondary text-white px-3 py-2">
                                    <i class="fas fa-hourglass-half me-1"></i>Scheduled
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Payment Method Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-plus-circle me-2 text-primary"></i>Add Payment Method
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPaymentForm">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Type</label>
                        <select class="form-select">
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="gcash">GCash</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Card Number</label>
                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Expiry Date</label>
                                <input type="text" class="form-control" placeholder="MM/YY">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">CVV</label>
                                <input type="text" class="form-control" placeholder="123">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="setDefault">
                            <label class="form-check-label" for="setDefault">
                                Set as default payment method
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addPaymentMethod()">
                    <i class="fas fa-plus me-2"></i>Add Payment Method
                </button>
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
.payment-method-item {
    transition: all 0.2s ease;
}
.payment-method-item:hover {
    background-color: #f8f9fa;
    transform: translateY(-1px);
}
.card {
    transition: transform 0.2s ease-in-out;
}
.card:hover {
    transform: translateY(-2px);
}
</style>

<script>
function addPaymentMethod() {
    const modal = bootstrap.Modal.getInstance(document.getElementById('addPaymentModal'));
    modal.hide();
    
    Swal.fire({
        icon: 'success',
        title: 'Payment Method Added!',
        text: 'Your new payment method has been added successfully.',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
}
</script>

@endsection
