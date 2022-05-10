<div class="separator my-5"></div>

<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <h4 class="mt-2">{{ __('messages.subscription_plans.plan_features') }}</h4>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <label class="form-check form-switch form-check-custom form-check-solid float-end">
            <input class="form-check-input" type="checkbox" name="select_all" id="selectAll" value="0"/>
            <span class="form-check-label fw-bold">{{ __('messages.subscription_plans.select_all') }}</span>
        </label>
    </div>
</div>

<div class="separator my-5"></div>

<div class="row">
    @foreach($planFeatures as $planFeature)
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
            <label class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input feature" type="checkbox" name="plan_feature[]"
                       value="{{ $planFeature->id }}"
                        {{ isset($subscriptionPlanFeatures) && in_array($planFeature->id, $subscriptionPlanFeatures) ? 'checked' : '' }}/>
                <span class="form-check-label fw-bold">{{ $planFeature->name }}</span>
            </label>
        </div>
    @endforeach
</div>
