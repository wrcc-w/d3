@extends('layouts.app')
@section('title')
    {{ __('messages.user.profile_details') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
@endsection
@section('content')
    @php $styleCss = 'style'; @endphp
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container">
                @include('flash::message')
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{ __('messages.user.profile_details') }}</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form id="kt_account_profile_details_form" method="POST"
                              action="{{ route('update.profile.setting') }}"
                              class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    {{ Form::label('Avatar', __('messages.user.avatar').':',  ['class'=> 'col-lg-4 form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                        {{ $styleCss }}="
                                        background-image: url('{{ asset('web/media/avatars/blank.png') }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                        {{ $styleCss }}="background-image: url('{{ $user->profile_image }}')">
                                    </div>
                                    @php
                                        $image = asset('assets/images/avatar.png');
                                    @endphp
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                           data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                           data-bs-original-title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7">
                                            {{ Form::file('image', ['value' => asset('web/media/avatars/150-2.jpg')]) }}
                                        </i>
                                        {{ Form::file('avatar', ['accept' => '.png, .jpg, .jpeg']) }}
                                        {{ Form::hidden('avatar_remove') }}
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                          data-bs-original-title="Cancel avatar"><i class="bi bi-x fs-2"></i>
                                            </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                          data-bs-original-title="Remove avatar"
                                    {{$styleCss}}="display:@if($user->profile_image == $image) none @else block  @endif"
                                    ><i
                                            class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 form-label fs-6 fw-bolder required text-gray-700 mb-3">{{ __('messages.user.full_name').':' }}</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    {{ Form::text('first_name', $user->first_name, ['class'=> 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'placeholder' => 'First name', 'required']) }}
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    {{ Form::text('last_name', $user->last_name, ['class'=> 'form-control form-control-lg form-control-solid', 'placeholder' => 'Last name', 'required']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.user.email').':' }}</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            {{ Form::email('email', $user->email, ['class'=> 'form-control form-control-lg form-control-solid', 'placeholder' => 'Email', 'required']) }}
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.user.contact_number').':' }}</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            {{ Form::tel('contact', isset($user)?$user->contact:null, ['class' => 'form-control form-control-lg form-control-solid', 'placeholder' => 'Phone number', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
                            {{ Form::hidden('region_code',isset($user) ? $user->region_code : null,['id'=>'prefix_code']) }}
                            <br>
                            <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
                            <span id="error-msg" class="hide"></span>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>

                </div>
                @hasrole('admin')
                <div class="card-footer d-flex py-6 px-9">
                    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                    <a href="{{route('admin.dashboard')}}" type="reset"
                       class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
                </div>
                @elserole('super_admin')
                <div class="card-footer d-flex py-6 px-9">
                    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                    <a href="{{route('super.admin.dashboard')}}" type="reset"
                       class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
                </div>
                @else
                    <div class="card-footer d-flex py-6 px-9">
                        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                        <a href="{{route('client.dashboard')}}" type="reset"
                           class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
                    </div>
                    @endrole
                    </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        let isEdit = true
        let phoneNo = "{{ !empty($user) ? (($user->region_code).($user->contact)) : null }}"
        let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}"
    </script>
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
