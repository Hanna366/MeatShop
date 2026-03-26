@if(session('show_plan_alert') || session('plan_restriction'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('plan_restriction'))
        Swal.fire({
            icon: 'warning',
            title: '🚫 Plan Upgrade Required',
            html: `
                <div style="text-align: left; padding: 10px;">
                    <p><strong>Feature:</strong> {{ session('plan_restriction')['feature'] }}</p>
                    <p><strong>Your Plan:</strong> <span class="badge bg-info">{{ session('plan_restriction')['current_plan'] }}</span></p>
                    <p><strong>Required:</strong> <span class="badge bg-warning">{{ session('plan_restriction')['required_plan'] }}</span></p>
                    <hr style="margin: 15px 0;">
                    <p style="color: #666; margin-bottom: 20px;">
                        This feature is available only with the <strong>{{ session('plan_restriction')['required_plan'] }}</strong> plan or higher.
                    </p>
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <h6 style="margin-bottom: 10px;">📈 Upgrade Benefits:</h6>
                        <ul style="margin: 0; padding-left: 20px;">
                            <li>Access to {{ session('plan_restriction')['feature'] }}</li>
                            <li>Enhanced features and tools</li>
                            <li>Priority customer support</li>
                            <li>Advanced reporting capabilities</li>
                        </ul>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: '🚀 Upgrade Plan',
            cancelButtonText: '❌ Cancel',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            width: '600px',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ session('plan_restriction')['upgrade_url'] }}';
            }
        });
    @endif

    // Clear the session data after showing the alert
    @php
        session()->forget('show_plan_alert');
        session()->forget('plan_restriction');
    @endphp
});
</script>

<style>
.swal2-popup {
    border-radius: 12px !important;
}

.swal2-title {
    font-size: 1.5rem !important;
    font-weight: 600 !important;
}

.swal2-html-container {
    font-size: 0.95rem !important;
}

.badge {
    padding: 5px 10px !important;
    font-size: 0.85rem !important;
}

.animate__animated {
    animation-duration: 0.5s !important;
}
</style>
@endif

@if(session('feature_success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: '✅ Feature Available',
        text: '{{ session('feature_success') }}',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        position: 'top-end',
        toast: true,
        background: '#d4edda',
        color: '#155724'
    });
    
    @php
        session()->forget('feature_success');
    @endphp
});
</script>
@endif

@if(session('feature_error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'error',
        title: '❌ Access Denied',
        text: '{{ session('feature_error') }}',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        position: 'top-end',
        toast: true,
        background: '#f8d7da',
        color: '#721c24'
    });
    
    @php
        session()->forget('feature_error');
    @endphp
});
</script>
@endif
