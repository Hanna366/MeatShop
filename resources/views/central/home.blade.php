@extends('layouts.central')

@section('title', 'MeatShop Central')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h1>MeatShop Central</h1>
        <a href="{{ route('tenants.create') }}" class="btn btn-primary">Create Tenant</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 2rem;">
        <div class="card">
            <div>
                <p style="color: #666; margin: 0 0 0.5rem 0;">Total Tenants</p>
                <h3 style="margin: 0;">{{ $stats['total_tenants'] ?? 0 }}</h3>
            </div>
        </div>
        <div class="card" style="border-left: 4px solid #28a745;">
            <div>
                <p style="color: #666; margin: 0 0 0.5rem 0;">Active Tenants</p>
                <h3 style="margin: 0; color: #28a745;">{{ $stats['active_tenants'] ?? 0 }}</h3>
            </div>
        </div>
        <div class="card" style="border-left: 4px solid #ffc107;">
            <div>
                <p style="color: #666; margin: 0 0 0.5rem 0;">Suspended Tenants</p>
                <h3 style="margin: 0; color: #ffc107;">{{ $stats['suspended_tenants'] ?? 0 }}</h3>
            </div>
        </div>
        <div class="card" style="border-left: 4px solid #dc3545;">
            <div>
                <p style="color: #666; margin: 0 0 0.5rem 0;">Unpaid Tenants</p>
                <h3 style="margin: 0; color: #dc3545;">{{ $stats['unpaid_tenants'] ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 1rem;">Recent Tenants</h3>
        
        @forelse($tenants as $tenant)
            <table class="table">
                <thead>
                    <tr>
                        <th>Business Name</th>
                        <th>Email</th>
                        <th>Plan</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->business_name }}</td>
                        <td>{{ $tenant->business_email }}</td>
                        <td>{{ ucfirst($tenant->plan ?? 'basic') }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; 
                                   background: {{ $tenant->status === 'active' ? '#d4edda' : ($tenant->status === 'suspended' ? '#f8d7da' : '#fff3cd') }}; 
                                   color: {{ $tenant->status === 'active' ? '#155724' : ($tenant->status === 'suspended' ? '#721c24' : '#856404') }};">
                                {{ ucfirst($tenant->status ?? 'active') }}
                            </span>
                        </td>
                        <td>{{ $tenant->created_at ? $tenant->created_at->format('M d, Y') : '-' }}</td>
                        <td>
                            <a href="{{ route('tenants.show', $tenant->tenant_id) }}" class="btn btn-primary" style="font-size: 0.875rem; padding: 0.25rem 0.5rem;">Manage</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @empty
            <p>No tenants found. <a href="{{ route('tenants.create') }}">Create your first tenant</a>.</p>
        @endforelse
    </div>
</div>
@endsection
