<footer class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">{{ date('Y') }}&copy;</span>
            <a href="{{ route('index') }}" target="_blank"
                class="text-gray-800 text-hover-primary">{{ config('app.name') }}</a>
        </div>
    </div>
</footer>
