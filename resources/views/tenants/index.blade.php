@extends('layouts.central_simple')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h1>Tenants</h1>
        <a href="{{ route('tenants.create') }}" class="btn btn-primary">Create New Tenant</a>
    </div>

    <div class="card">
        @forelse($tenants as $tenant)
            <table class="table">
                <thead>
                    <tr>
                        <th>Tenant ID</th>
                        <th>Tenant</th>
                        <th>Address</th>
                        <th>Domain</th>
                        <th>Admin</th>
                        <th>Email</th>
                        <th>Plan</th>
                        <th>Status</th>
                        <th>Plan Start</th>
                        <th>Plan End</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $tenant->tenant_id }}</td>
                        <td>{{ $tenant->business_name }}</td>
                        <td>{{ is_array($tenant->business_address) ? implode(', ', $tenant->business_address) : $tenant->business_address }}</td>
                        <td>{{ $tenant->domain ?? '-' }}</td>
                        <td>{{ $tenant->admin_name ?? '-' }}</td>
                        <td>{{ $tenant->business_email }}</td>
                        <td>{{ ucfirst($tenant->plan ?? 'basic') }}</td>
                        <td>{{ ucfirst($tenant->status ?? 'active') }}</td>
                        <td>{{ $tenant->plan_started_at ? $tenant->plan_started_at->format('M d, Y') : '-' }}</td>
                        <td>{{ $tenant->plan_ends_at ? $tenant->plan_ends_at->format('M d, Y') : '-' }}</td>
                        <td>
                            <a href="{{ route('tenants.show', $tenant->tenant_id) }}" class="btn btn-primary">Manage</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        @empty
            <p>No tenants found. <a href="{{ route('tenants.create') }}">Create your first tenant</a>.</p>
        @endforelse
    </div>
</div>
@endsection
