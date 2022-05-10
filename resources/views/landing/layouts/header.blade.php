@php
    $styleCss = 'style';
    $settingValue = getSuperAdminSettingValue();
@endphp
<div class="navigation">
    <div class="navigation-wrapper">
        <div class="container">
            <div class="navigation-inner">
                <div class="navigation-logo">
                    <a href="{{ route('landing.home') }}">
                        <img src="{{ asset($settingValue['app_logo']['value']) }}" alt="orions-logo" class="logo-img">
                    </a>
                </div>
                <div class="navigation-menu">
                    <div class="mobile-header">
                        <div class="logo">
                            <a href="{{ route('landing.home') }}">
                                <img src="{{ asset($settingValue['app_logo']['value']) }}" alt="image" class="logo-img">
                            </a>
                        </div>
                        <ul>
                            <li class="close-button">
                                <i class="fas fa-times"></i>
                            </li>
                        </ul>
                    </div>
                    <ul class="parent d-flex align-items-center">
                        <li>
                            <a href="{{ route('landing.home') }}" class="link-underline link-underline-1">
                                <span>{{ __('messages.landing.home') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing.contact.us') }}" class="link-underline link-underline-1">
                                <span>{{ __('messages.enquiry.contact') }}</span>
                            </a>
                        </li>
                        <a href="{{ route('login') }}" class="button button-basic ms-5">
                            <div class="button-inner py-3 px-5">
                                <div class="button-content">
                                    <h4>{{ Auth::check() ? __('messages.dashboard') : 'Login' }}</h4>
                                </div>
                            </div>
                        </a>
                    </ul>
                    <div class="social">
                        <h6>Follow</h6>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="background-pattern">
                        <div class="background-pattern-img background-loop"
                        {{$styleCss}}="background-image: url(landing-theme/images/patterns/pattern.jpg);"></div>
                    <div class="background-pattern-gradient"></div>
                </div>
            </div>
            <div class="navigation-bar">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    </div>
</div>
