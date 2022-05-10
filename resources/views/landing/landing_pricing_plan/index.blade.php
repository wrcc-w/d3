@php
    $styleCss = 'style';
@endphp
<div class="pricing-section">
    <div class="pricing-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="section-heading center c-white">
                        <div class="sub-heading upper ls-1">
                            <i class="las la-tags"></i>
                            <h5>Our app rates</h5>
                        </div>
                        <div class="main-heading">
                            <h1>Pricing plans for you.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="pricing">
                <div class="row">
                    <div class="col">
                        <div class="pricing-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse($subscriptionPricingPlans as $subscriptionsPricingPlan)
                                        <div class="swiper-slide">
                                            <div class="pricing-single basic">
                                                <h5 class="plan">{{ $subscriptionsPricingPlan->name }}</h5>
                                                <div class="price price-month">
                                                    <div class="month">
                                                        <span>{{ getSubscriptionPlanCurrencyIcon
($subscriptionsPricingPlan->currency) }}</span><span class="number">{{ number_format($subscriptionsPricingPlan->price) }}</span><sup>/{{ \App\Models\SubscriptionPlan::PLAN_TYPE_SORT_NAME[$subscriptionsPricingPlan->frequency] }}</sup>
                                                    </div>
                                                    <div class="year">

                                                    </div>
                                                </div>
                                                <a href="{{route('login')}}" class="button button-basic">
                                                    <div class="button-inner">
                                                        <div class="button-content">
                                                            <h4>Get Started</h4>
                                                        </div>
                                                    </div>
                                                </a>

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
                                                            {{ __('Subscription Plan Not Found') }}
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
        <div class="background-pattern background-pattern-1">
            <div class="background-pattern-img background-loop"
            {{$styleCss}}="background-image: url(landing-theme/images/patterns/pattern.jpg);"></div>
        <div class="background-pattern-gradient"></div>
        <div class="background-pattern-bottom">
            <div class="image"
            {{$styleCss}}="background-image: url(landing-theme/images/patterns/pattern-1.jpg)"></div>
    </div>
</div>
</div>
</div>
