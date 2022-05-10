<div class="col-xl-4 my-4">
    <div class="price-table h-100 pricing-section">
        <div class="price-header">
            <h3 class="price-title text-capitalize">{{ $subscriptionsPricingPlan->name }}</h3>
            <div class="price-value">
                <h2>
                    <span>{{ getSubscriptionPlanCurrencyIcon($subscriptionsPricingPlan->currency) }}</span>{{ number_format($subscriptionsPricingPlan->price) }}
                </h2>
                <span>{{ \App\Models\SubscriptionPlan::PLAN_TYPE[$subscriptionsPricingPlan->frequency] }}</span>
            </div>
        </div>
        <div class="price-list">
            <ul class="list-unstyled">
                @php
                    $activeSubscription = currentActiveSubscription();
                @endphp
                @if (getLoggedInUser() != null && count($subscriptionsPricingPlan->subscription) > 0)
                    @if($activeSubscription !== null && $activeSubscription->trial_ends_at != null && $activeSubscription->subscription_plan_id == $subscriptionsPricingPlan->id)
                        <li>
                            <h4>{{ __('messages.subscription_plans.valid_until') }}
                                : {{ $subscriptionsPricingPlan->trial_days }}
                            </h4>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                        @if($activeSubscription && isAuth() &&  $activeSubscription->subscriptionPlan->id == $subscriptionsPricingPlan->id)
                        <li>
                            <h4>
                                {{ __('messages.subscription_plans.end_date') }}
                                :
                                {{ getParseDate($activeSubscription->end_date)->format('d-m-Y') }}
                            </h4>
                        </li>
                        @endif
                    @endif
                @endif
            </ul>
        </div>
        @php
            $currentActiveSubscription = currentActiveSubscription();
        @endphp

        @if($currentActiveSubscription && isAuth() && $subscriptionsPricingPlan->id == $currentActiveSubscription->subscription_plan_id && !$currentActiveSubscription->isExpired())
            @if($subscriptionsPricingPlan->price != 0)
                <button type="button"
                        class="btn btn-success current-active-btn text-capitalize rounded-pill mx-auto d-block pricing-plan-button-active make-cursor-default"
                        data-id="{{ $subscriptionsPricingPlan->id }}">
                    <span>{{ __('currently active') }}</span></button>
            @else
                <button type="button"
                        class="btn btn-info rounded-pill mx-auto d-block renew-free-plan btn-fit-content make-cursor-default">
                    <span>{{ __('Free Plan cannot be renewed/chosen again') }}</span>
                </button>
            @endif
        @else
            @if($currentActiveSubscription && isAuth() && !$currentActiveSubscription->isExpired() && ($subscriptionsPricingPlan->price == 0 || $subscriptionsPricingPlan->price != 0))
                @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                    <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', [$subscriptionsPricingPlan->id, 'landing', $screenFrom]) : 'javascript:void(0)' }}"
                       class="btn btn-primary text-capitalize border border-gray rounded-pill mx-auto  btn-fit-content {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                       data-id="{{ $subscriptionsPricingPlan->id }}"
                       data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                        <span>{{ __('switch plan') }}</span></a>
                @else
                    <button type="button"
                            class="btn btn-info rounded-pill mx-auto d-block renew-free-plan btn-fit-content make-cursor-default">
                        <span>{{ __('Free Plan cannot be renewed/chosen again') }}</span>
                    </button>
                @endif
            @else
                @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                    <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', [$subscriptionsPricingPlan->id, 'landing', $screenFrom]) : 'javascript:void(0)' }}"
                       class="btn btn-primary text-capitalize border border-gray rounded-pill mx-auto  btn-fit-content {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                       data-id="{{ $subscriptionsPricingPlan->id }}"
                       data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                        <span>{{ __('choose plan') }}</span></a>
                @else
                    <button type="button"
                            class="btn btn-info rounded-pill mx-auto d-block renew-free-plan btn-fit-content make-cursor-default">
                        <span>{{ __('Free Plan cannot be renewed/chosen again') }}</span>
                    </button>
                @endif
            @endif
        @endif

    </div>
</div>

