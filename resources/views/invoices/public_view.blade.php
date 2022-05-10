<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice | {{ getAppName() }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset(getSettingValue('favicon_icon')) }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{ asset('backend/css/vendor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/fonts.css') }}" rel="stylesheet" type="text/css"/>
    @yield('page_css')
    <link href="{{ asset('backend/css/3rd-party.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/3rd-party-custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
@php $styleCss = 'style'; @endphp
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
{{ $styleCss }}="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"
data-new-gr-c-s-check-loaded="14.1025.0" data-gr-ext-installed="">

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="content d-flex flex-column flex-column-fluid content-padding-top" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container">
                    <div class="infy-loader" id="overlay-screen-lock">
                        @include('loader')
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                            <div class="row">
                                <div class="col-12">
                                    @include('flash::message')
                                </div>
                            </div>
                            <div class="p-12">
                                @include('invoices.show_fields',['isPublicView'=> false])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</div>
<script src="{{ asset('backend/js/vendor.js') }}"></script>
<script src="{{ asset('backend/js/3rd-party-custom.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
</body>
</html>
