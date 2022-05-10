@extends('landing.layouts.app')
@section('title')
    {{ __('messages.web_home.home') }}
@endsection
@section('content')

    <!--
    hero 1 - start
    -->
    <div class="hero hero-1 feature-section feature-section-0">
        <div class="hero-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-0 order-lg-1 col-10 offset-1 order-2">
                        <div class="hero-content">
                            <h1 class="c-dark">{{ $sectionOne['text_main'] }}</h1>
                            <p class="large c-grey">{{ $sectionOne['text_secondary'] }}</p>
                            <div class="download-button-group">
                            </div>
                            @if(!\Illuminate\Support\Facades\Auth::check())
                                <a href="{{ route('register') }}" class="button button-basic">
                                    <div class="button-inner py-3 px-5">
                                        <div class="button-content">
                                            <h4>Sign Up</h4>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 order-lg-2 col-10 offset-1 order-1">
                        <div class="hero-image">
                            <div class="feature-section-image">
                                <img src="{{ isset($sectionOne['img_url_one']) ? asset($sectionOne['img_url_one']) : asset('landing-theme/images/feature-section-1-phone.png') }}"
                                     class="phone"
                                     alt="phone">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--
    hero 1 - end
    -->

    <!--
    app features wide section - start
    -->
    <div class="app-feature app-feature-1">
        <div class="app-feature-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 offset-lg-0 col-10 offset-1">
                        <div class="section-heading center width-64">
                            <div class="sub-heading c-purple upper ls-1">
                                <i class="las la-cog"></i>
                                <h5>{{ $sectionTwo['text_main'] }}</h5>
                            </div>
                            <div class="main-heading c-dark">
                                <h1>{{ $sectionTwo['text_secondary'] }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 gy-5">
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-2">
                            <div class="app-feature-single-wrapper">
                                <a href="#" class="icon">
                                    <i class="las la-money-bill"></i>
                                </a>
                                <a href="#">
                                    <h3 class="c-dark">{{ $sectionTwo['card_one_text'] }}</h3>
                                </a>
                                <p class="c-grey">{{ $sectionTwo['card_one_text_secondary'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-2">
                            <div class="app-feature-single-wrapper">
                                <a href="" class="icon">
                                    <i class="las la-calendar"></i>
                                </a>
                                <a href="">
                                    <h3 class="c-dark">{{ $sectionTwo['card_two_text'] }}</h3>
                                </a>
                                <p class="c-grey">{{ $sectionTwo['card_two_text_secondary'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-2">
                            <div class="app-feature-single-wrapper">
                                <a href="" class="icon">
                                    <i class="las la-credit-card"></i>
                                </a>
                                <a href="">
                                    <h3 class="c-dark">{{ $sectionTwo['card_three_text'] }}</h3>
                                </a>
                                <p class="c-grey">{{ $sectionTwo['card_three_text_secondary'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-2">
                            <div class="app-feature-single-wrapper">
                                <a href="" class="icon">
                                    <i class="las la-file-alt"></i>
                                </a>
                                <a href="">
                                    <h3 class="c-dark">{{ $sectionTwo['card_four_text'] }}</h3>
                                </a>
                                <p class="c-grey">{{ $sectionTwo['card_four_text_secondary'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-2">
                            <div class="app-feature-single-wrapper">
                                <a href="" class="icon">
                                    <i class="las la-copy"></i>
                                </a>
                                <a href="">
                                    <h3 class="c-dark">{{ $sectionTwo['card_five_text'] }}</h3>
                                </a>
                                <p class="c-grey">{{ $sectionTwo['card_five_text_secondary'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1">
                        <div class="app-feature-single app-feature-single-2">
                            <div class="app-feature-single-wrapper">
                                <a href="" class="icon">
                                    <i class="las la-file-invoice-dollar"></i>
                                </a>
                                <a href="">
                                    <h3 class="c-dark">{{ $sectionTwo['card_six_text'] }}</h3>
                                </a>
                                <p class="c-grey">{{ $sectionTwo['card_six_text_secondary'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    feature section - start
    -->
    <div class="feature-section feature-section-1 feature-section-spacing-2">
        <div class="feature-section-wrapper">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-5 offset-lg-0 col-10 offset-1">
                        <div class="feature-section-image">
                            <img src="{{ isset($sectionThree['img_url']) ? asset($sectionThree['img_url']) : asset('web_front/images/main-banner/banner-one/woman-doctor.png') }}"
                                 class="phone"
                                 alt="phone">

                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-10 offset-1">
                        <div class="feature-section-content">
                            <div class="section-heading">
                                <div class="sub-heading c-purple upper ls-1">
                                    <i class="las la-cog"></i>
                                    <h5>{{ $sectionThree['text_main'] }}</h5>
                                </div>
                                <div class="main-heading c-dark">
                                    <h1>{{ $sectionThree['text_secondary'] }}</h1>
                                </div>
                            </div>
                            <div class="icon-text-1-group">
                                <div class="icon-text-1">
                                    <i class="las la-language"></i>
                                    <div>
                                        <h4 class="c-dark">{{ $sectionThree['text_one'] }}</h4>
                                        <p class="c-grey">{{ $sectionThree['text_one_secondary'] }}</p>
                                    </div>
                                </div>
                                <div class="icon-text-1">
                                    <i class="las la-print"></i>
                                    <div>
                                        <h4 class="c-dark">{{ $sectionThree['text_two'] }}</h4>
                                        <p class="c-grey">{{ $sectionThree['text_two_secondary'] }}</p>
                                    </div>
                                </div>
                                <div class="icon-text-1">
                                    <i class="las la-business-time"></i>
                                    <div>
                                        <h4 class="c-dark">{{ $sectionThree['text_three'] }}</h4>
                                        <p class="c-grey">{{ $sectionThree['text_three_secondary'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    feature section - end
    -->

    <!--
    pricing section - start
    -->
        @include('landing.landing_pricing_plan.index', ['screenFrom' => Route::currentRouteName()])

    <!--
    pricing section - end
    -->

    <!--
    testimonial section - start
    -->
    <div class="testimonial-section">
        <div class="testimonial-section-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                        <div class="section-heading center width-55">
                            <div class="sub-heading c-purple upper ls-1">
                                <i class="las la-comments"></i>
                                <h5>feedbacks</h5>
                            </div>
                            <div class="main-heading c-dark">
                                <h1>What people are talking about.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="testimonial-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @forelse($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-slide">
                                            <div class="image">
                                                <div class="image-wrapper">
                                                    <div class="image-inner">
                                                        <img src="{{$testimonial->image_url}}"
                                                             alt="testimony-image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>{{$testimonial->description}}</p>
                                                <h5>— {{$testimonial->name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-lg-12 col-md-6">
                                        <div class="card text-center empty_featured_card">
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <div>
                                                    <div class="empty-featured-portfolio">
                                                        <i class="fas fa-question"></i>
                                                    </div>
                                                    <h3 class="card-title mt-3">
                                                        {{ __('Testimonial Not Found') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    testimonial section - end
    -->

    <!--
    faq section - start
    -->
    <div class="faq-section">
        <div class="faq-section-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-10 offset-xxl-1 col-lg-12 offset-lg-0 col-10 offset-1">
                        <div class="section-heading center width-64">
                            <div class="sub-heading c-purple upper ls-1">
                                <i class="las la-file-alt"></i>
                                <h5>discover</h5>
                            </div>
                            <div class="main-heading c-dark">
                                <h1>Some frequently asked questions</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9 col-md-8 col-10">
                        <div class="faq-wrapper">
                            <div class="faq" id="faq-accordion">
                                <!--
                                accordion item - start
                                -->
                                @forelse($faqs as $faq)
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="faq-{{$faq->id}}">
                                            <button
                                                    class="accordion-button {{$loop->first ? '' : 'collapsed'}}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#faq-collapse-{{$faq->id}}"
                                                    aria-expanded="{{$loop->first ? 'true' : 'false'}}"
                                                    aria-controls="faq-collapse-{{$faq->id}}">
                                                <span>{{$faq->question}}</span>
                                            </button>
                                        </div>
                                        <div
                                                id="faq-collapse-{{$faq->id}}"
                                                class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}"
                                                aria-labelledby="faq-{{$faq->id}}"
                                                data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <p>{{$faq->answer}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="text-center empty_featured_card border-0">
                                                <div class="card-body d-flex align-items-center justify-content-center">
                                                    <div>
                                                        <div class="empty-featured-portfolio">
                                                            <i class="fas fa-question text-white p-3 theme-bg  display-6 my-2"></i>
                                                        </div>
                                                        <h3 class="card-title mt-3">
                                                            {{__('We couldn\'t find any records')}}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    faq section - end
    -->
    @include('landing.home.enquiry')

@endsection
@section('scripts')
    <script>
        let getLoggedInUserdata = "{{ getLoggedInUser() }}"
        let logInUrl = "{{ url('login') }}"
        let fromPricing = true
        let makePaymentURL = "{{ route('purchase-subscription') }}"
        let subscribeText = "{{ __('messages.subscription_pricing_plans.choose_plan') }}"
        let toastData = JSON.parse('@json(session('toast-data'))')
    </script>
@endsection
