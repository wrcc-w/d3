@extends('super_admin_settings.edit')
@section('title')
    {{ __('messages.general') }}
@endsection
@section('section')
    <div class="card border-0">
        <div class="card-body">
            {{ Form::open(['route' => ['super.admin.settings.update'], 'method' => 'post', 'files' => true, 'id' => 'createSetting']) }}
            <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-5">
                        {{ Form::label('app_name', __('messages.setting.app_name').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <span class="required"></span>
                        {{ Form::text('app_name', $settings['app_name'], ['class' => 'form-control form-control-solid','maxLength'=> 30,'placeholder' => 'Enter App Name']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-5">
                        {{ Form::label('plan_expire_notification', __('messages.setting.plan_expire_notification').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <span class="required"></span>
                        {{ Form::number('plan_expire_notification', $settings['plan_expire_notification'], ['class' => 'form-control form-control-solid','maxLength'=> 2,'placeholder' => 'Enter Plan Expire Notification','min'=>'0','value'=>'0','oninput'=>"validity.valid||(value=value.replace(/[e\-]/gi,''))"]) }}
                    </div>
                </div>

                <!-- App Logo Field -->
                <div class="form-group col-sm-6 mb-5">
                    <div class="row2">
                        <div class="d-block">
                            {{ Form::label('app_logo', __('messages.setting.app_logo').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"
                               data-placement="top" title="{{  __('messages.setting.image_validation') }}"></i>
                        </div>
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <?php
                            $style = 'style=';
                            $background = 'background-image:';
                            ?>
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center" id="previewImage"
                            {{$style}}"{{$background}}
                            url({{ ($settings['app_logo']) ? asset($settings['app_logo']) : asset('hms-saas-logo.png') }}
                            )">
                        </div>
                        <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Change app logo">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            {{ Form::file('app_logo',['id'=>'appLogo','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                            <input type="hidden" name="avatar_remove">
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                              data-bs-original-title="Cancel app logo">
                                                                <i class="bi bi-x fs-2"></i></span>
                    </div>
                </div>
            </div>

            <!-- Favicon Field -->
            <div class="form-group col-sm-6 mb-5">
                <div class="row2">
                    <div class="d-block">
                        {{ Form::label('favicon', __('messages.setting.fav_icon').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"
                           data-placement="top" title="{{  __('messages.setting.favicon_validation') }}"></i>
                    </div>
                    <?php
                    $style = 'style=';
                    $background = 'background-image:';
                    ?>
                    <div class="image-input image-input-outline" data-kt-image-input="true">
                        <div class="image-input-wrapper w-60px h-60px bgi-position-center" id="previewImage"
                        {{$style}}"{{$background}}
                        url({{ ($settings['favicon_icon']) ? asset($settings['favicon_icon']) : asset('web/media/logos/favicon.ico') }}
                        )">
                    </div>
                    <label
                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="Change Favicon">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        {{ Form::file('favicon_icon',['id'=>'favicon','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                        <input type="hidden" name="avatar_remove">
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                          data-bs-original-title="Cancel app favicon">
                                                                <i class="bi bi-x fs-2"></i></span>
                </div>
            </div>
        </div>

        <div class="card-header ps-3 border-bottom-1 border-0" data-bs-toggle="collapse"
             aria-expanded="true"
             aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('messages.payment-gateway') }}</h3>
            </div>
        </div>
        <div id="kt_account_profile_details" class="collapse show">
            <div class="row">
                <div class="form-group col-sm-5 mb-5">
                    {{ Form::label('stripe_key', __('messages.setting.stripe_key').':', ['class' => 'form-label stripe-key-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('stripe_key',$settings['stripe_key'], ['class' => 'form-control stripe-key form-control-solid','placeholder' => 'Enter Stripe Key']) }}
                </div>
                <div class="form-group col-sm-5 mb-5">
                    {{ Form::label('stripe_secret', __('messages.setting.stripe_secret').':', ['class' => 'form-label stripe-secret-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('stripe_secret',$settings['stripe_secret'], ['class' => 'form-control stripe-secret form-control-solid','placeholder' => 'Enter Stripe Secret']) }}
                </div>
                <div class="form-group col-sm-2 mb-5 mt-10">
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input feature" type="checkbox" name="stripe_enabled"
                               {{$settings['stripe_enabled'] == 1 ? "checked" : ""}}  id="stripe">
                        <span class="form-check-label fw-bold" for="stripe">Stripe</span>&nbsp;&nbsp;
                    </label>
                </div>
                <div class="form-group col-sm-5 mb-5">
                    {{ Form::label('paypal_client_id', __('messages.setting.paypal_client_id').':', ['class' => 'form-label paypal-client-id-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('paypal_client_id',$settings['paypal_client_id'], ['class' => 'form-control paypal-client-id form-control-solid','placeholder' => 'Enter Paypal Client Id']) }}
                </div>
                <div class="form-group col-sm-5 mb-5">
                    {{ Form::label('paypal_secret', __('messages.setting.paypal_secret').':', ['class' => 'form-label paypal-secret-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('paypal_secret',$settings['paypal_secret'], ['class' => 'form-control paypal-secret form-control-solid','placeholder' => 'Enter Paypal Secret']) }}
                </div>
                <div class="form-group col-sm-2 mb-5 mt-10">
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input feature" type="checkbox" name="paypal_enabled"
                               id="paypal" {{$settings['paypal_enabled'] == 1 ? "checked" : ""}}>
                        <span class="form-check-label fw-bold" for="paypal">Paypal</span>&nbsp;&nbsp;
                    </label>
                </div>
                <div class="form-group col-sm-5 mb-5">
                    {{ Form::label('razorpay_key', __('messages.setting.razorpay_key').':', ['class' => 'form-label razorpay-key-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('razorpay_key',$settings['razorpay_key'], ['class' => 'form-control razorpay-key form-control-solid','placeholder' => 'Enter Razorpay Key']) }}
                </div>
                <div class="form-group col-sm-5 mb-5">
                    {{ Form::label('razorpay_secret', __('messages.setting.razorpay_secret').':', ['class' => 'form-label razorpay-secret-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('razorpay_secret',$settings['razorpay_secret'], ['class' => 'form-control razorpay-secret form-control-solid','placeholder' => 'Enter Razorpay Secret']) }}
                </div>
                <div class="form-group col-sm-2 mb-5 mt-10">
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input feature" type="checkbox" name="razorpay_enabled"
                               id="razorpay" {{$settings['razorpay_enabled'] == 1 ? "checked" : ""}}>
                        <span class="form-check-label fw-bold" for="razorpay">Razorpay</span>&nbsp;&nbsp;
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
            {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-light btn-active-light-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
    </div>
    </div>
@endsection
