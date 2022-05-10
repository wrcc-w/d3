<div class="footer py-4 d-flex flex-lg-column footer-fix" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">All Rights Reserved ©{{ \Carbon\Carbon::now()->year }}  </span>
            @role('super_admin')
            <a href="#" class="text-gray-800 text-hover-primary">{{ $settingValue['app_name']['value'] }}</a>
            @endrole
            @role('admin|client')
            <a href="#" class="text-gray-800 text-hover-primary">{{ getAppName() }}</a>
            @endrole
        </div>
    </div>
</div>
