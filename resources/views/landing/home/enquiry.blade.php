<!--
    contact form section - start
    -->
@php
    $styleCss = 'style';
@endphp
<div class="contact-form-section">
    <div class="contact-form-section-wrapper">
        <div class="container">
            <div class="row gx-5 contact-form-section-row">
                <div class="col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <!--
                    contact form - start
                    -->
                    <div class="contact-form drop-shadow-2">
                        <div class="contact-form-wrapper">
                            <div class="section-heading section-heading-2 center">
                                <div class="sub-heading c-purple upper ls-1">
                                    <i class="las la-envelope"></i>
                                    <h5>contact</h5>
                                </div>
                                <div class="main-heading c-dark">
                                    <h1>Write message</h1>
                                </div>
                            </div>
                            <form id="contactEnquiryForm">
                                @method('POST')
                                @csrf
                                <div class="ajax-message" {{$styleCss}}="font-size: 15px">
                        </div>

                        <div class="form-floating">
                            <input class="input form-control" name="full_name" id="name-field" type="text"
                                   placeholder="Full name">
                            <label for="name-field">Full name</label>
                        </div>
                        <div class="form-floating">
                            <input class="input form-control" name="email" id="email-field" type="text"
                                   placeholder="Email address">
                            <label for="email-field">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input class="input form-control" name="message" id="message-field" type="text"
                                           placeholder="Message">
                                    <label for="message-field">Message</label>
                                </div>
                                <button class="button button-3">
                                        <span class="button-inner">
                                            <span class="button-content">
                                                <span class="text">Submit</span>
                                            </span>
                                        </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--
                    contact form - end
                    -->
                </div>
                <div class="col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <!--
                    newsletter form - start
                    -->
                    <div class="contact-form contact-form-1 drop-shadow-2">
                        <div class="contact-form-wrapper">
                            <div class="section-heading section-heading-2 center">
                                <div class="sub-heading c-purple upper ls-1">
                                    <i class="las la-envelope-open"></i>
                                    <h5>subscribe</h5>
                                </div>
                                <div class="main-heading c-dark">
                                    <h1>Our newsletter</h1>
                                </div>
                            </div>
                            <div class="contact-form-icon">
                                <i class="las la-envelope-open-text"></i>
                            </div>
                            <div class="ajax-message-subscribe" {{$styleCss}}="font-size: 15px"></div>
                        <form id="subscribe-form" method="POST">
                            <div class="form-floating">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="input form-control" id="email-field-1" type="text"
                                       placeholder="Email address" name="email">
                                <label for="email-field-1">Email address</label>
                            </div>
                            <button type="submit" class="button button-2" id="subscribeBtn">
                                        <span class="button-inner">
                                            <span class="button-content">
                                                <span class="text">Subscribe</span>
                                            </span>
                                        </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--
                    newsletter form - end
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--
contact form section - end
-->
