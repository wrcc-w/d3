<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    @php
        $settingValue = getSuperAdminSettingValue();
    @endphp
    <title>@yield('title') | {{  $settingValue['app_name']['value']}} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($settingValue['favicon_icon']['value']) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($settingValue['favicon_icon']['value']) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($settingValue['favicon_icon']['value']) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('landing-theme/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-theme/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-theme/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-theme/css/overlay-scrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-theme/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-theme/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-theme/css/custom.css') }}" rel="stylesheet">

    @yield('page_css')
    @yield('css')
</head>
<body>

<div class="main-wrapper">

    @include('landing.layouts.header')

    @yield('content')

    @include('landing.layouts.footer')
</div>

@routes
<script src="{{asset('landing-theme/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('landing-theme/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('landing-theme/js/jquery.min.js')}}"></script>
<script src="{{asset('landing-theme/js/glightbox.min.js')}}"></script>
<script src="{{asset('landing-theme/js/overlay-scrollbars.min.js')}}"></script>
<script src="{{asset('landing-theme/js/gsap.min.js')}}"></script>
<script src="{{asset('landing-theme/js/main.js')}}"></script>
<script src="{{ mix('assets/js/contact_enquiry/contact_enquiry.js') }}"></script>
<script src="{{ mix('assets/js/subscribe/create.js') }}"></script>

@yield('page_scripts')
@yield('scripts')
</body>
</html>
