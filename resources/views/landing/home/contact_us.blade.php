@extends('landing.layouts.app')
@section('title')
    Contact Us
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @php
        $styleCss = 'style';
        $settingValue = getSuperAdminSettingValue();
    @endphp
    <!--
    page header - start
    -->
    <div class="page-header">
        <div class="page-header-wrapper">
            <div class="page-header-inner">
                <div class="container">
                    <div class="row d-lg-flex align-items-lg-end">
                        <div class="col-lg-6">
                            <div class="page-header-content c-white">
                                <h1>Contact Us</h1>
                                <ul>
                                    <li>
                                        <a href="{{ route('landing.home') }}" class="link-underline">
                                            <span>Home</span>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="las la-angle-right"></i>
                                        <a href="{{ route('landing.contact.us') }}" class="link-underline">
                                            <span>Contact</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-pattern background-pattern-2">
                <div class="background-pattern-img background-loop"
                {{$styleCss}}="background-image: url(landing-theme/images/patterns/pattern.jpg);"></div>
            <div class="background-pattern-gradient"></div>
            <div class="background-pattern-bottom">
                <div class="image"
                {{$styleCss}}="background-image: url(landing-theme/images/patterns/pattern-2.jpg)"></div>
        </div>
    </div>
    </div>
    </div>
    <!--
    page header - end
    -->

    <!--
    contact details - start
    -->
    <div class="contact-details">
        <div class="contact-details-wrapper">
            <div class="container">
                <!--
                contact details heading - start
                -->
                <div class="row">
                    <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                        <div class="section-heading center width-55">
                            <div class="sub-heading c-purple upper ls-1">
                                <i class="las la-handshake"></i>
                                <h5>get in touch</h5>
                            </div>
                            <div class="main-heading c-dark">
                                <h1>Many ways to reach us today.</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                contact details heading - end
                -->
                <!--
                contact details row - start
                -->
                <div class="row gx-5 details-row">
                    <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-1">
                            <div class="app-feature-single-wrapper">
                                <div class="icon">
                                    <i class="las la-phone-volume"></i>
                                </div>
                                <h3 class="c-dark">Call Us</h3>
                                <p class="c-grey">
                                    Phone:
                                    <a href="tel:{{ $settingValue['phone']['value'] }}"
                                       class="link-underline link-underline-1">
                                        <span>{{ $settingValue['phone']['value'] }}</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-1">
                            <div class="app-feature-single-wrapper">
                                <div class="icon">
                                    <i class="las la-envelope-open"></i>
                                </div>
                                <h3 class="c-dark">Email Us</h3>
                                <p class="c-grey">
                                    <a href="mailto:{{ $settingValue['email']['value'] }}"
                                       class="link-underline link-underline-1">
                                        <span>{{ $settingValue['email']['value'] }}</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-1">
                            <div class="app-feature-single-wrapper">
                                <div class="icon">
                                    <i class="las la-map-marked-alt"></i>
                                </div>
                                <h3 class="c-dark">Find Us</h3>
                                <p class="c-grey">{{ $settingValue['address']['value'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                contact details row - end
                -->
            </div>
        </div>
    </div>
    <!--
    contact details - end
    -->
    @include('landing.home.enquiry')
@endsection
