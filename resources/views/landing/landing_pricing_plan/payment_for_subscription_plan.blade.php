@extends('landing.layouts.app')
@section('title')
    {{__('messages.subscription_plans.payment_type')}}
@endsection
@section('page_css')
    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="page-content">
        <section>
            <br/><br/><br/>
            <div class="container-fluid">
                @php
                    $cpData = getCurrentPlanDetails();
                    $planText = ($cpData['isExpired']) ? 'Current Expired Plan' : 'Current Plan';
                    $currentPlan = $cpData['currentPlan'];
                @endphp


                <div class="card-body">
                    <div class="row justify-content-center">
                        @if(currentActiveSubscription()->end_date >= \Carbon\Carbon::now())
                            <div class="col-md-5 col-12 mb-md-0 mb-10">
                                <div class="card plan-card-shadow h-100 card-xxl-stretch p-5 me-md-2">
                                    <div class="card-header border-0 px-0 bg-transparent">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder text-primary fs-3 mb-1 me-0">{{$planText}}</span>
                                        </h3>
                                        <hr/>
                                    </div>
                                    <div class="card-body pt-0 pb-3 px-0">
                                        <div class="flex-stack">
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">Plan Name</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['name']}}</span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-3 text-gray-800 fw-bolder">Plan Price</h4>
                                                <span class="fs-5 text-muted fw-bold mt-1">
                                        <span class="mb-2">
                                            {{ getSubscriptionPlanCurrencyIcon($currentPlan->currency) }}
                                        </span>
                                        {{ number_format($currentPlan->price) }}
                                    </span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">Start Date</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['startAt']}}</span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">End Date</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['endsAt']}}</span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">Used Days</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['usedDays']}} Days</span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">Remaining
                                                    Days</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">{{$cpData['remainingDays']}} Days</span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">Used
                                                    Balance</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                        <span class="mb-2">
                                            {{ getSubscriptionPlanCurrencyIcon($currentPlan->currency) }}
                                        </span>
                                        {{$cpData['usedBalance']}}
                                    </span>
                                            </div>
                                            <div class="d-flex align-items-center plan-border-bottom py-2">
                                                <h4 class="fs-5 w-50 mb-0 me-5 text-gray-800 fw-bolder">Remaining
                                                    Balance</h4>
                                                <span class="fs-5 w-50 text-muted fw-bold mt-1">
                                        <span class="mb-2">{{ getSubscriptionPlanCurrencyIcon($currentPlan->currency) }}</span>
                                        {{$cpData['remainingBalance']}}
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php
                            $newPlan = getProratedPlanData($subscriptionsPricingPlan->id);
                        @endphp
                        <div class="col-md-5 col-12">
                            <div class="card plan-card-shadow h-100 card-xxl-stretch p-5 ms-md-2">
                                <div class="card-header border-0 px-0 bg-transparent">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-primary fs-3 mb-1 me-0">New Plan</span>
                                    </h3>
                                    <hr/>
                                </div>
                                <div class="card-body pt-0 pb-3 px-0">
                                    <div class="flex-stack">
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">Plan Name</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">{{$newPlan['name']}}</span>
                                        </div>
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">Plan Price</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">
                                        <span class="mb-2">
                                            {{ getSubscriptionPlanCurrencyIcon($subscriptionsPricingPlan->currency) }}
                                        </span>
                                        {{ number_format($subscriptionsPricingPlan->price) }}
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">Start Date</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">{{ $newPlan['startDate'] }}</span>
                                        </div>
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">End Date</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">{{$newPlan['endDate']}}</span>
                                        </div>
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">Total Days</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">{{$newPlan['totalDays']}} Days</span>
                                        </div>
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">Remaining
                                                Balance of
                                                Prev. Plan</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">
                                        {{ getSubscriptionPlanCurrencyIcon($subscriptionsPricingPlan->currency) }}
                                                {{$newPlan['remainingBalance']}}
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center plan-border-bottom py-2">
                                            <h4 class="fs-5 plan-data mb-0 me-5 text-gray-800 fw-bolder">Payable
                                                Amount</h4>
                                            <span class="fs-5 text-muted fw-bold mt-1">
                                        {{ getSubscriptionPlanCurrencyIcon($subscriptionsPricingPlan->currency) }}
                                                {{$newPlan['amountToPay']}}
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center mt-5 plan-controls">
                            <div class="mt-5 me-3 d-flex justify-content-center w-50 {{ $newPlan['amountToPay'] <= 0 ? 'd-none' : '' }}">
                                {{ Form::select('payment_type', $paymentTypes, \App\Models\Subscription::TYPE_STRIPE, ['required', 'id' => 'paymentType']) }}
                            </div>
                            <div class="mt-5 stripePayment proceed-to-payment">
                                <button type="button"
                                        class="btn btn-primary rounded-pill mx-auto d-block makePayment"
                                        data-id="{{ $subscriptionsPricingPlan->id }}"
                                        data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                    <span>
                                        {{ __('messages.subscription_plans.pay_or_switch_plan') }}
                                    </span>
                                </button>
                            </div>
                            <div class="mt-5 paypalPayment proceed-to-payment d-none">
                                <button type="button"
                                        class="btn btn-primary rounded-pill mx-auto d-block paymentByPaypal"
                                        data-id="{{ $subscriptionsPricingPlan->id }}"
                                        data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                    <span>
                                        {{ __('messages.subscription_plans.pay_or_switch_plan') }}
                                    </span>
                                </button>
                            </div>
                            <div class="mt-5 razorPayPayment proceed-to-razor-pay-payment d-none">
                                <button type="button"
                                        class="btn btn-primary rounded-pill mx-auto d-block razor_pay_payment"
                                        data-id="{{ $subscriptionsPricingPlan->id }}"
                                        data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                    {{ __('messages.subscription_plans.pay_or_switch_plan') }}</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        let getLoggedInUserdata = "{{ getLoggedInUser() }}"
        let logInUrl = "{{ url('login') }}"
        let fromPricing = "{{ $fromScreen }}"
        let makePaymentURL = "{{ route('purchase-subscription') }}"
        let subscribeText = "{{ __('choose plan') }}"
        let stripe = Stripe('{{ config('services.stripe.key') }}')
        let subscriptionPlans = "{{ route('subscription.pricing.plans.index') }}"
        let toastData = JSON.parse('@json(session('toast-data'))')
        let makeRazorpayURl = "{{ route('admin.razorpay.init') }}"
        let razorpayPaymentFailed = "{{ route('admin.razorpay.failed') }} "
        let razorpayPaymentFailedModal = "{{ route('admin.razorpay.failed.modal') }}"
        let options = {
            'key': "{{ config('payments.razorpay.key') }}",
            'amount': 1, //  100 refers to 1 
            'currency': 'INR',
            'name': "{{getAppName()}}",
            'order_id': '',
            'description': '',
            'image': '{{ getLogoUrl() }}', // logo here
            'callback_url': "{{ route('admin.razorpay.success') }}",
            'prefill': {
                'email': '', // recipient email here
                'name': '', // recipient name here
            },
            'readonly': {
                'name': 'true',
                'email': 'true',
            },
            'modal': {
                'ondismiss': function () {
                    $.ajax({
                        type: 'POST',
                        url: razorpayPaymentFailedModal,
                        success: function (result) {
                            if (result.url) {
                                window.location.href = result.url
                            }
                        },
                        error: function (result) {
                            displayErrorMessage(result.responseJSON.message)
                        },
                    })
                },
            },
        }
    </script>
    <script src="{{ mix('assets/js/subscriptions/subscription.js') }}"></script>
    <script src="{{ mix('assets/js/subscriptions/payment-message.js') }}"></script>
@endsection
