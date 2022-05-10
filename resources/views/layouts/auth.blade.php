<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @php
        $settingValue = getSuperAdminSettingValue();
    @endphp
    <title>@yield('title') | {{  $settingValue['app_name']['value'] }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset($settingValue['favicon_icon']['value']) }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!-- General CSS Files -->
    <link href="{{ asset('web/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('web/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/daterangepicker.css') }}" rel="stylesheet">
    <!-- CSS Libraries -->
    @stack('css')
    @yield('css')
</head>
@php $styleCss = 'style'; @endphp
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
      {{ $styleCss }}="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
    {{ $styleCss }}="background-image: url({{ asset('web/media/illustrations/progress-hd.png') }})">
    @yield('content')
</div>
</div>
<footer>
    <div class="container-fluid padding-0">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6">
                <div class="copyright text-center text-muted">
                    All rights reserved &copy; {{ date('Y') }} <a href="{{ url('/') }}"
                                                                  class="font-weight-bold ml-1"
                                                                  target="_blank">{{ getAppName() }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('web/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('web/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
@stack('scripts')
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
</script>
<script>
    $('#kt_daterangepicker_3').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
        },
    );
</script>
</body>
</html>

