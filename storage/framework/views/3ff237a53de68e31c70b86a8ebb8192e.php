<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Meat Shop SaaS - <?php echo $__env->yieldContent('title', 'Central Dashboard'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(160deg, #183153 0%, #0f4c81 55%, #1e7f6f 100%);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            z-index: 1000;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar .brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.82);
            padding: 0.95rem 1.4rem;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
        }

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            min-width: 200px;
            z-index: 1000;
            display: none;
        }

        .nav-dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-item:hover {
            color: #16181b;
            background-color: #f8f9fa;
        }

        .dropdown-divider {
            height: 0;
            margin: 0.5rem 0;
            overflow: hidden;
            border-top: 1px solid #e9ecef;
        }

        .badge {
            font-size: 0.6rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .navbar {
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
            padding: 1rem 1.8rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <div class="d-flex align-items-center gap-2 mb-2">
                <i class="fas fa-building"></i>
                <h5 class="mb-0">MeatShop Central</h5>
            </div>
            <?php if(session('user.name')): ?>
                <small class="text-white-50"><?php echo e(session('user.name')); ?></small>
            <?php endif; ?>
        </div>

        <nav class="nav flex-column">
            <!-- Dashboard -->
            <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                <i class="fas fa-chart-line me-2"></i>Dashboard
                <span class="badge bg-primary text-white ms-2" style="font-size: 0.6rem;"><?php echo e(\App\Models\Tenant::count()); ?></span>
            </a>
            
            <!-- Tenants Management -->
            <div class="nav-dropdown">
                <a class="nav-link <?php echo e(request()->routeIs('tenants.*') ? 'active' : ''); ?>" href="<?php echo e(route('tenants.index')); ?>">
                    <i class="fas fa-store me-2"></i>Tenants
                    <i class="fas fa-chevron-down ms-1"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('tenants.index')); ?>">
                        <i class="fas fa-list me-2"></i>All Tenants
                        <span class="badge bg-primary text-white ms-auto"><?php echo e(\App\Models\Tenant::count()); ?></span>
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('tenants.create')); ?>">
                        <i class="fas fa-plus-circle me-2"></i>Create New Tenant
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('tenants.index')); ?>?filter=active">
                        <i class="fas fa-check-circle me-2 text-success"></i>Active Only
                        <span class="badge bg-success text-white ms-auto"><?php echo e(\App\Models\Tenant::where('status', 'active')->count()); ?></span>
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('tenants.index')); ?>?filter=suspended">
                        <i class="fas fa-pause-circle me-2 text-warning"></i>Suspended Only
                        <span class="badge bg-warning text-white ms-auto"><?php echo e(\App\Models\Tenant::where('status', 'suspended')->count()); ?></span>
                    </a>
                </div>
            </div>
            
            <!-- Subscription & Billing -->
            <div class="nav-dropdown">
                <a class="nav-link <?php echo e(request()->routeIs('subscription.*') ? 'active' : ''); ?>" href="<?php echo e(route('subscription.billing')); ?>">
                    <i class="fas fa-file-invoice-dollar me-2"></i>Billing
                    <i class="fas fa-chevron-down ms-1"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('subscription.billing')); ?>">
                        <i class="fas fa-file-invoice me-2"></i>Billing Overview
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('subscription.billing')); ?>?tab=invoices">
                        <i class="fas fa-file-invoice me-2"></i>Invoices
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('subscription.billing')); ?>?tab=payments">
                        <i class="fas fa-credit-card me-2"></i>Payment History
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('subscription.billing')); ?>?tab=methods">
                        <i class="fas fa-credit-card me-2"></i>Payment Methods
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('subscription.billing')); ?>?tab=settings">
                        <i class="fas fa-cog me-2"></i>Billing Settings
                    </a>
                </div>
            </div>
            
            <!-- Plans & Pricing -->
            <div class="nav-dropdown">
                <a class="nav-link <?php echo e(request()->routeIs('pricing') ? 'active' : ''); ?>" href="<?php echo e(route('pricing')); ?>">
                    <i class="fas fa-tags me-2"></i>Plans
                    <i class="fas fa-chevron-down ms-1"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('pricing')); ?>">
                        <i class="fas fa-tags me-2"></i>All Plans
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('pricing')); ?>?plan=basic">
                        <i class="fas fa-crown me-2 text-primary"></i>Basic Plan
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('pricing')); ?>?plan=standard">
                        <i class="fas fa-crown me-2 text-warning"></i>Standard Plan
                    </a>
                    <a class="dropdown-item" href="<?php echo e(route('pricing')); ?>?plan=premium">
                        <i class="fas fa-crown me-2 text-danger"></i>Premium Plan
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('pricing')); ?>?compare">
                        <i class="fas fa-balance-scale me-2"></i>Compare Plans
                    </a>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <a class="nav-link" href="<?php echo e(route('tenants.create')); ?>">
                <i class="fas fa-plus-circle me-2"></i>Create Tenant
            </a>
            
            <hr class="my-2" style="border-color: rgba(255,255,255,0.2);">
            
            <!-- User Account -->
            <div class="nav-dropdown">
                <?php if(session('user.name')): ?>
                    <a class="nav-link" href="#" onclick="toggleUserMenu()">
                        <i class="fas fa-user me-2"></i><?php echo e(session('user.name')); ?>

                        <i class="fas fa-chevron-down ms-1"></i>
                    </a>
                    <div class="dropdown-menu" id="userMenu">
                        <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">
                            <i class="fas fa-user me-2"></i>My Profile
                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('settings')); ?>">
                            <i class="fas fa-cog me-2"></i>Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="showQuickStats()">
                            <i class="fas fa-chart-pie me-2"></i>Quick Stats
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="showHelp()">
                            <i class="fas fa-question-circle me-2"></i>Help & Support
                        </a>
                    </div>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </a>
                <?php endif; ?>
            </div>
            
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="m-0">
                <?php echo csrf_field(); ?>
                <button type="submit" class="nav-link text-start w-100 border-0 bg-transparent">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="btn btn-link d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function () {
            document.querySelector('.sidebar').classList.toggle('show');
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.nav-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
        
        // Toggle user menu
        function toggleUserMenu() {
            const userMenu = document.getElementById('userMenu');
            if (userMenu) {
                userMenu.style.display = userMenu.style.display === 'block' ? 'none' : 'block';
            }
        }
        
        // Show quick stats modal
        function showQuickStats() {
            Swal.fire({
                title: 'Quick Statistics',
                html: `
                    <div class="text-start">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Tenants:</span>
                            <strong><?php echo e(\App\Models\Tenant::count()); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Active:</span>
                            <strong class="text-success"><?php echo e(\App\Models\Tenant::where('status', 'active')->count()); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Suspended:</span>
                            <strong class="text-warning"><?php echo e(\App\Models\Tenant::where('status', 'suspended')->count()); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Unpaid:</span>
                            <strong class="text-danger"><?php echo e(\App\Models\Tenant::where('status', 'unpaid')->count()); ?></strong>
                        </div>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Close'
            });
        }
        
        // Show help modal
        function showHelp() {
            Swal.fire({
                title: 'Help & Support',
                html: `
                    <div class="text-start">
                        <h6>Need Help?</h6>
                        <p>Our support team is here to assist you with any questions or issues.</p>
                        <div class="mb-3">
                            <strong>Email:</strong> support@meatshop.com<br>
                            <strong>Phone:</strong> +1-800-MEATSHOP<br>
                            <strong>Hours:</strong> Mon-Fri 9AM-6PM EST
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary btn-sm me-2">Documentation</a>
                            <a href="#" class="btn btn-outline-primary btn-sm">Contact Support</a>
                        </div>
                    </div>
                `,
                icon: 'question-circle',
                confirmButtonText: 'Close'
            });
        }
        
        // Handle dropdown menu clicks
        document.querySelectorAll('.nav-dropdown > a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const dropdown = this.nextElementSibling;
                if (dropdown && dropdown.classList.contains('dropdown-menu')) {
                    // Close all other dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        if (menu !== dropdown) {
                            menu.style.display = 'none';
                        }
                    });
                    // Toggle current dropdown
                    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
        
        // Global notification system
        window.showNotification = function(type, title, message, timer = 3000) {
            const icon = type === 'success' ? 'success' : 
                        type === 'error' ? 'error' : 
                        type === 'warning' ? 'warning' : 'info';
            
            Swal.fire({
                icon: icon,
                title: title,
                text: message,
                timer: timer,
                timerProgressBar: true,
                showConfirmButton: type !== 'success',
                confirmButtonText: 'OK',
                position: 'top-end',
                toast: type === 'success',
                customClass: {
                    container: 'notification-container'
                }
            });
        };
        
        // Show notifications for session messages
        window.addEventListener('DOMContentLoaded', function() {
            // Check for success messages
            const successMessages = <?php echo json_encode(session('success', []), 512) ?>;
            if (successMessages && successMessages.length > 0) {
                if (typeof successMessages === 'string') {
                    showNotification('success', 'Success!', successMessages);
                } else {
                    successMessages.forEach(msg => {
                        showNotification('success', 'Success!', msg);
                    });
                }
            }
            
            // Check for error messages
            const errorMessages = <?php echo json_encode(session('error', []), 512) ?>;
            if (errorMessages && errorMessages.length > 0) {
                if (typeof errorMessages === 'string') {
                    showNotification('error', 'Error!', errorMessages);
                } else {
                    errorMessages.forEach(msg => {
                        showNotification('error', 'Error!', msg);
                    });
                }
            }
            
            // Check for info messages
            const infoMessages = <?php echo json_encode(session('info', []), 512) ?>;
            if (infoMessages && infoMessages.length > 0) {
                if (typeof infoMessages === 'string') {
                    showNotification('info', 'Information', infoMessages);
                } else {
                    infoMessages.forEach(msg => {
                        showNotification('info', 'Information', msg);
                    });
                }
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\Rusty\Music\MeatShop\resources\views/layouts/central.blade.php ENDPATH**/ ?>