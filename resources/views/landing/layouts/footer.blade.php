@php
    $styleCss = 'style';
    $settingValue = getSuperAdminSettingValue();
@endphp
<footer class="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="footer-row">
                        <div class="footer-detail">
                            <a href="#">
                                <img src="{{ asset($settingValue['app_logo']['value']) }}" alt="footer-logo"
                                     class="logo-img">
                            </a>
                            <p class="c-grey-1">{!! $settingValue['footer_text']['value'] !!}</p>
                            <div class="links">
                                <a class="link-underline" href="mailto:{{ $settingValue['email']['value'] }}">
                                    <span>{{ $settingValue['email']['value'] }}</span>
                                </a>
                                <a class="link-underline" href="tel:{{ $settingValue['phone']['value'] }}">
                                    <span>{{ $settingValue['phone']['value'] }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="footer-list footer-social social-gradient">
                            @if(empty($settingValue['twitter_url']['value']) && empty($settingValue['facebook_url']['value']) &&
    empty($settingValue['linkedin_url']['value']) && empty($settingValue['youtube_url']['value']))
                            @else
                                <h6>Follow</h6>
                            @endif
                            <ul>
                                <li class="twitter {{ empty($settingValue['twitter_url']['value']) ? 'd-none' : ''}}">
                                    <a href="{{ $settingValue['twitter_url']['value'] }}" class="link-underline"
                                       target="_blank">
                                        <i class="fab fa-twitter"></i>
                                        <span>Twitter</span>
                                    </a>
                                </li>
                                <li class="facebook {{ empty($settingValue['facebook_url']['value']) ? 'd-none' : ''}}">
                                    <a href="{{ $settingValue['facebook_url']['value'] }}" class="link-underline"
                                       target="_blank">
                                        <i class="fab fa-facebook"></i>
                                        <span>Facebook</span>
                                    </a>
                                </li>
                                <li class="linkedin {{ empty($settingValue['linkedin_url']['value']) ? 'd-none' : ''}}">
                                    <a href="{{ $settingValue['linkedin_url']['value'] }}" class="link-underline"
                                       target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                        <span>Linkedin</span>
                                    </a>
                                </li>
                                <li class="youtube {{ empty($settingValue['youtube_url']['value']) ? 'd-none' : ''}}">
                                    <a href="{{ $settingValue['youtube_url']['value'] }}" class="link-underline"
                                       target="_blank">
                                        <i class="fab fa-youtube"></i>
                                        <span>Youtube</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                </div>
            </div>
        </div>
        <div class="footer-pattern"
        {{$styleCss}}="background-image: url(landing-theme/images/patterns/pattern-1.jpg)"></div>
    </div>
</footer>

