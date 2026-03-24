@extends('layouts.central_simple')

@section('title', 'Create New Tenant - Meat Shop POS')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h1>Create New Tenant</h1>
        <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Back to Tenants</a>
    </div>

    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('account.store') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <h3>Account Information</h3>
                    
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" 
                               value="{{ old('name') }}" placeholder="Enter full name" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" 
                               value="{{ old('email') }}" placeholder="Enter email address" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" 
                               placeholder="Create password" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" 
                               placeholder="Confirm password" required>
                    </div>
                </div>
                
                <div>
                    <h3>Business Information</h3>
                    
                    <div class="form-group">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" name="company_name" 
                               value="{{ old('company_name') }}" placeholder="Enter business name">
                        @error('company_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="business_phone" 
                               value="{{ old('business_phone') }}" placeholder="Enter phone number">
                        @error('business_phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Business Address</label>
                        <textarea class="form-control" name="business_address" 
                                  rows="3" placeholder="Enter complete business address">{{ old('business_address') }}</textarea>
                        <small>Include street, city, state, and postal code</small>
                        @error('business_address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Subscription Plan</label>
                        <select class="form-control" name="plan" required>
                            <option value="">Select a plan</option>
                            <option value="basic" {{ old('plan') == 'basic' ? 'selected' : '' }}>Basic - Free</option>
                            <option value="standard" {{ old('plan') == 'standard' ? 'selected' : '' }}>Standard - $29/month</option>
                            <option value="premium" {{ old('plan') == 'premium' ? 'selected' : '' }}>Premium - $99/month</option>
                        </select>
                        @error('plan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">Create Tenant</button>
                <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
