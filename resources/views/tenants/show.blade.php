@extends('layouts.central_simple')

@section('content')
<div class="container-fluid">
    <!-- Modern Header -->
    <div class="d-flex justify-content-between align-items-center pt-4 pb-3 mb-4">
        <div>
            <div class="d-flex align-items-center mb-2">
                <div class="bg-gradient-primary text-white rounded-circle p-3 me-3">
                    <i class="fas fa-building fa-lg"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 fw-bold">{{ $tenant->business_name }}</h1>
                    <p class="text-muted mb-0">Tenant Management Dashboard</p>
                </div>
            </div>
        </div>
        <div>
            <a href="/tenants" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Tenants
            </a>
        </div>
    </div>

    <!-- Status Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Status</h6>
                            <div class="h5 mb-0 fw-bold">{{ ucfirst($tenant->status) }}</div>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2">
                                <i class="fas fa-{{ $tenant->status === 'active' ? 'check' : ($tenant->status === 'suspended' ? 'pause' : 'archive') }}-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-success">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Plan</h6>
                            <div class="h5 mb-0 fw-bold">{{ ucfirst($tenant->plan) }}</div>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2">
                                <i class="fas fa-crown"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-info">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Payment</h6>
                            <div class="h5 mb-0 fw-bold">{{ ucfirst($tenant->payment_status) }}</div>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2">
                                <i class="fas fa-credit-card"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-warning">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase mb-2 fw-bold">Created</h6>
                            <div class="h5 mb-0 fw-bold">{{ $tenant->created_at ? $tenant->created_at->format('M d') : '—' }}</div>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Basic Information -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-info-circle me-2 text-primary"></i>Basic Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Business Name</label>
                                <div class="fw-bold">{{ $tenant->business_name }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Domain</label>
                                <div class="fw-bold">
                                    @if($tenant->domain)
                                        <code class="text-primary">{{ $tenant->domain }}</code>
                                    @else
                                        <span class="text-muted">No domain</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Plan Started</label>
                                <div class="fw-bold">{{ optional($tenant->plan_started_at)->format('M d, Y') ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Plan Ends</label>
                                <div class="fw-bold">{{ optional($tenant->plan_ends_at)->format('M d, Y') ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Business Address</label>
                                <div class="fw-bold">{{ $tenant->business_address ?? 'No address provided' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Access Information -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-key me-2 text-primary"></i>Access Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Admin Name</label>
                                <div class="fw-bold">{{ $tenant->admin_name ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Email Address</label>
                                <div class="fw-bold">{{ $tenant->admin_email ?? $tenant->business_email }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Phone Number</label>
                                <div class="fw-bold">{{ $tenant->business_phone ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="text-muted small fw-semibold">Database Name</label>
                                <div class="fw-bold"><code>{{ $tenant->db_name }}</code></div>
                            </div>
                        </div>
                    </div>

                    <!-- Localhost Setup -->
                    <div class="alert alert-info border-0 bg-info bg-opacity-10 mt-3">
                        <div class="d-flex align-items-start">
                            <div class="bg-info bg-opacity-25 rounded-circle p-2 me-3">
                                <i class="fas fa-cog text-info"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-2">Localhost Setup</h6>
                                <p class="mb-2 text-muted">To access this tenant locally, add a hosts entry:</p>
                                <div class="bg-dark text-white p-2 rounded mb-2">
                                    <code>127.0.0.1 {{ $tenant->domain }}</code>
                                </div>
                                <p class="mb-0 text-muted">Then visit: <strong>http://{{ $tenant->domain }}:8000</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Form -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-edit me-2 text-primary"></i>Update Tenant Settings
                    </h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger border-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-opacity-25 rounded-circle p-2 me-3">
                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Please fix the following errors:</h6>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endif
                    <form method="POST" action="{{ route('tenants.updateStatus', $tenant->tenant_id) }}">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">Domain</label>
                            <input type="text" name="domain" class="form-control" value="{{ $tenant->domain }}" placeholder="ramcar.localhost">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Business Address</label>
                            <textarea name="business_address" class="form-control" rows="2" placeholder="Enter business address">{{ $tenant->business_address }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ ($tenant->status ?? 'active') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ ($tenant->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="suspended" {{ ($tenant->status ?? '') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                                <option value="unpaid" {{ ($tenant->status ?? '') === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="archived" {{ ($tenant->status ?? '') === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Payment Status</label>
                            <select name="payment_status" class="form-select">
                                <option value="paid" {{ ($tenant->payment_status ?? 'paid') === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="unpaid" {{ ($tenant->payment_status ?? '') === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="overdue" {{ ($tenant->payment_status ?? '') === 'overdue' ? 'selected' : '' }}>Overdue</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Suspension Message</label>
                            <input type="text" name="suspended_message" class="form-control" value="{{ $tenant->suspended_message ?? 'Please contact your administrator.' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
