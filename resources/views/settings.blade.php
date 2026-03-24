@extends('layouts.central')

@section('title', 'Settings - MeatShop POS')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h1 class="h2 mb-0">Settings</h1>
            <p class="text-muted mb-0">Configure your application preferences</p>
        </div>
        <div>
            <button class="btn btn-primary" onclick="saveSettings()">
                <i class="fas fa-save me-2"></i>Save Settings
            </button>
        </div>
    </div>

    <div class="row">
        <!-- General Settings -->
        <div class="col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>General Settings
                    </h5>
                </div>
                <div class="card-body">
                    <form id="settingsForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="site_name" class="form-label">
                                        <i class="fas fa-building me-1"></i>Application Name
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </span>
                                        <input type="text" class="form-control" id="site_name" name="site_name" 
                                               value="MeatShop POS" placeholder="Enter application name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="timezone" class="form-label">
                                        <i class="fas fa-clock me-1"></i>Timezone
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <select class="form-select" id="timezone" name="timezone">
                                            <option value="UTC">UTC</option>
                                            <option value="America/New_York">Eastern Time (ET)</option>
                                            <option value="America/Chicago">Central Time (CT)</option>
                                            <option value="America/Denver">Mountain Time (MT)</option>
                                            <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="language" class="form-label">
                                        <i class="fas fa-language me-1"></i>Language
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-language"></i>
                                        </span>
                                        <select class="form-select" id="language" name="language">
                                            <option value="en">English</option>
                                            <option value="es">Español</option>
                                            <option value="fr">Français</option>
                                            <option value="de">Deutsch</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="email_notifications" class="form-label">
                                        <i class="fas fa-envelope me-1"></i>Email Notifications
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications" checked>
                                        <label class="form-check-label" for="email_notifications">
                                            Receive email notifications for important events
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-shield-alt me-2"></i>Security Settings
                    </h5>
                </div>
                <div class="card-body">
                    <form id="securityForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="current_password" class="form-label">
                                        <i class="fas fa-lock me-1"></i>Current Password
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="current_password" name="current_password" 
                                               placeholder="Enter current password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="new_password" class="form-label">
                                        <i class="fas fa-key me-1"></i>New Password
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control" id="new_password" name="new_password" 
                                               placeholder="Enter new password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="confirm_password" class="form-label">
                                        <i class="fas fa-key me-1"></i>Confirm New Password
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                               placeholder="Confirm new password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="two_factor" class="form-label">
                                        <i class="fas fa-mobile-alt me-1"></i>Two-Factor Authentication
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="two_factor" name="two_factor">
                                        <label class="form-check-label" for="two_factor">
                                            Enable two-factor authentication for enhanced security
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="session_timeout" class="form-label">
                                        <i class="fas fa-clock me-1"></i>Session Timeout
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <select class="form-select" id="session_timeout" name="session_timeout">
                                            <option value="15">15 minutes</option>
                                            <option value="30" selected>30 minutes</option>
                                            <option value="60">1 hour</option>
                                            <option value="120">2 hours</option>
                                            <option value="480">8 hours</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-check-input:checked {
    background-color: #007bff;
    border-color: #007bff;
}

.form-check-label {
    cursor: pointer;
}
</style>

<script>
function saveSettings() {
    Swal.fire({
        title: 'Settings Saved!',
        text: 'Your settings have been successfully updated.',
        icon: 'success',
        confirmButtonText: 'Great!'
    });
}

function saveSecurity() {
    Swal.fire({
        title: 'Security Updated!',
        text: 'Your security settings have been successfully updated.',
        icon: 'success',
        confirmButtonText: 'Great!'
    });
}
</script>
@endsection
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-primary">
                    <i class="fas fa-save me-1"></i> Save Changes
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-undo me-1"></i> Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Settings Navigation -->
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Settings Menu</h6>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#general" class="list-group-item list-group-item-action active">
                        <i class="fas fa-cog me-2"></i> General Settings
                    </a>
                    <a href="#business" class="list-group-item list-group-item-action">
                        <i class="fas fa-store me-2"></i> Business Info
                    </a>
                    <a href="#tax" class="list-group-item list-group-item-action">
                        <i class="fas fa-receipt me-2"></i> Tax & Currency
                    </a>
                    <a href="#inventory" class="list-group-item list-group-item-action">
                        <i class="fas fa-boxes me-2"></i> Inventory
                    </a>
                    <a href="#users" class="list-group-item list-group-item-action">
                        <i class="fas fa-users me-2"></i> User Management
                    </a>
                    <a href="#backup" class="list-group-item list-group-item-action">
                        <i class="fas fa-database me-2"></i> Backup & Restore
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- General Settings -->
            <div class="card mb-4" id="general">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Shop Name</label>
                                <input type="text" class="form-control" value="Meat Shop POS" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Shop Email</label>
                                <input type="email" class="form-control" value="admin@meatshop.com" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" value="+63 912 3456" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" value="123 Market Street, Manila" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Time Zone</label>
                                <select class="form-select">
                                    <option value="UTC+8" selected>Asia/Manila (UTC+8)</option>
                                    <option value="UTC+9">Asia/Tokyo (UTC+9)</option>
                                    <option value="UTC+7">Asia/Bangkok (UTC+7)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date Format</label>
                                <select class="form-select">
                                    <option value="Y-m-d" selected>YYYY-MM-DD</option>
                                    <option value="d/m/Y">DD/MM/YYYY</option>
                                    <option value="m/d/Y">MM/DD/YYYY</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Info -->
            <div class="card mb-4" id="business">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Business Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Business Name</label>
                                <input type="text" class="form-control" value="Premium Meat Shop Inc." />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Business Type</label>
                                <select class="form-select">
                                    <option value="retail" selected>Retail</option>
                                    <option value="wholesale">Wholesale</option>
                                    <option value="both">Both</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tax ID / VAT Number</label>
                                <input type="text" class="form-control" value="123-456-789-000" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Business License</label>
                                <input type="text" class="form-control" value="BL-2024-12345" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Business Description</label>
                                <textarea class="form-control" rows="3">Premium quality meat products serving the community since 2010. We offer the finest cuts of beef, pork, poultry, and lamb with competitive prices and excellent customer service.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tax & Currency -->
            <div class="card mb-4" id="tax">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Tax & Currency Settings</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Currency</label>
                                <select class="form-select">
                                    <option value="PHP" selected>Philippine Peso (₱)</option>
                                    <option value="USD">US Dollar ($)</option>
                                    <option value="EUR">Euro (€)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Currency Symbol Position</label>
                                <select class="form-select">
                                    <option value="before" selected>Before (₱100.00)</option>
                                    <option value="after">After (100.00₱)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">VAT Rate (%)</label>
                                <input type="number" class="form-control" value="12" step="0.1" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Service Charge (%)</label>
                                <input type="number" class="form-control" value="0" step="0.1" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="taxIncluded" checked>
                                <label class="form-check-label" for="taxIncluded">
                                    Include tax in product prices
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory Settings -->
            <div class="card mb-4" id="inventory">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Inventory Settings</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Low Stock Alert (%)</label>
                                <input type="number" class="form-control" value="20" min="1" max="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Out of Stock Alert</label>
                                <select class="form-select">
                                    <option value="email" selected>Email Notification</option>
                                    <option value="sms">SMS Notification</option>
                                    <option value="both">Both</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoReorder" checked>
                                <label class="form-check-label" for="autoReorder">
                                    Enable automatic reorder suggestions
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="trackExpiry" checked>
                                <label class="form-check-label" for="trackExpiry">
                                    Track product expiry dates
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="batchTracking">
                                <label class="form-check-label" for="batchTracking">
                                    Enable batch tracking
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Management -->
            <div class="card mb-4" id="users">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>admin</td>
                                    <td>admin@meatshop.com</td>
                                    <td><span class="badge bg-danger">Administrator</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>cashier1</td>
                                    <td>cashier1@meatshop.com</td>
                                    <td><span class="badge bg-primary">Cashier</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>manager</td>
                                    <td>manager@meatshop.com</td>
                                    <td><span class="badge bg-warning">Manager</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary mt-3">
                        <i class="fas fa-user-plus me-1"></i> Add New User
                    </button>
                </div>
            </div>

            <!-- Backup & Restore -->
            <div class="card mb-4" id="backup">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Backup & Restore</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Manual Backup</h6>
                            <p class="text-muted">Create a backup of your data</p>
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-download me-1"></i> Download Backup
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h6>Restore Backup</h6>
                            <p class="text-muted">Restore from a backup file</p>
                            <input type="file" class="form-control mb-2" accept=".sql,.json">
                            <button type="button" class="btn btn-warning">
                                <i class="fas fa-upload me-1"></i> Restore Backup
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Automatic Backup Settings</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoBackup" checked>
                                <label class="form-check-label" for="autoBackup">
                                    Enable automatic backups
                                </label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="form-label">Backup Frequency</label>
                                    <select class="form-select">
                                        <option value="daily" selected>Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Retention Period</label>
                                    <select class="form-select">
                                        <option value="7" selected>7 days</option>
                                        <option value="30">30 days</option>
                                        <option value="90">90 days</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
