<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @php
        $settingValue = getSuperAdminSettingValue();
    @endphp
    @role('super_admin')
    <title>@yield('title') | {{ $settingValue['app_name']['value'] }}</title>
    <link rel="icon" href="{{ asset($settingValue['favicon_icon']['value']) }}" type="image/png">
    @endrole
    @role('admin|client')
    <title>@yield('title') | {{ getAppName() }}</title>
    <link rel="icon" href="{{ asset(getSettingValue('favicon_icon')) }}" type="image/png">
    @endrole

    <!-- Favicon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!-- General CSS Files -->
    {{--    @if(app()->getLocale() == 'ar')--}}
    {{--        <link href="{{ asset('backend/assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    @endif--}}
    <link href="{{ asset('backend/css/vendor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/datatables.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/fonts.css') }}" rel="stylesheet" type="text/css"/>
    @yield('page_css')
    <link href="{{ asset('backend/css/3rd-party.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/3rd-party-custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    @if(Auth::user()->dark_mode && !Request::is('admin/template-setting*'))
        <link href="{{ mix('assets/css/livewire-table-dark.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/css/style.dark.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ mix('assets/css/custom-dark-mode.css') }}" rel="stylesheet" type="text/css"/>
    @elseif(Auth::user()->dark_mode && Request::is('admin/template-setting*'))
        <link href="{{ mix('assets/css/invoice-template-dark-mode.css') }}" rel="stylesheet" type="text/css"/>
    @else
        <link href="{{ mix('assets/css/livewire-table.css') }}" rel="stylesheet" type="text/css"/>
    @endif
    @livewireStyles
    @yield('css')
</head>
@php $styleCss = 'style'; @endphp
<body id="kt_body"
      class="{{ (Auth::user()->dark_mode) ? 'dark-mode' : ''}} header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
{{ $styleCss }}="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"
data-new-gr-c-s-check-loaded="14.1025.0" data-gr-ext-installed="">

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        @include('layouts.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid detail-kt-wrapper" id="kt_wrapper">
            @include('layouts.header')
            <div class="content d-flex flex-column flex-column-fluid content-padding-top" id="kt_content">
                @yield('header_toolbar')
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container">
                        <div class="infy-loader" id="overlay-screen-lock">
                            @include('loader')
                        </div>
                        @if(isSubscriptionExpired()['status'] && getLoggedInUser()->hasRole('admin'))
                            <div class="alert alert-warning mt-5">
                                <div class="d-flex align-items-center">
                    <span class="svg-icon svg-icon-2hx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3"
                                  d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                  fill="black"></path>
                            <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                  fill="black"></path>
                        </svg>
                    </span>
                                    <div>
                                        <span class="text-dark">{{ isSubscriptionExpired()['message'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <span class="svg-icon">
                    <svg xmlns="https://www.w3.org/2000/svg" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1"/>
                            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                  fill="#000000" fill-rule="nonzero"/>
                        </g>
                    </svg>
                </span>
    </div>
    @include('profile.changePassword')
</div>
<script>
    let decimalsSeparator = "{{ getSettingValue('decimal_separator') }}";
    let thousandsSeparator = "{{ getSettingValue('thousand_separator') }}";
</script>
<script src="{{ asset('backend/js/vendor.js') }}"></script>
<script src="{{ asset('messages.js') }}"></script>
<script src="{{ asset('backend/js/datatables.js') }}"></script>
<script src="{{ asset('backend/js/3rd-party-custom.js') }}"></script>
@livewireScripts
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/users/user-profile.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ mix('assets/js/sidebar_menu_search/sidebar_menu_search.js') }}"></script>
@routes
@yield('page_js')
@yield('scripts')
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
    let changePasswordUrl = "{{ route('user.changePassword') }}";
    let currentDateFormat = "{{ currentDateFormat() }}";
    let momentDateFormat = "{{ momentJsCurrentDateFormat() }}";
    let ajaxCallIsRunning = false
</script>
</body>
</html>
