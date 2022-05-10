@extends('layouts.auth')
@section('title')
    Forgot Password
@endsection
@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <a href="{{'/'}}" class="mb-12">
            <img alt="Logo" src="{{ getLogoUrl() }}" class="h-45px logo"/>
        </a>
        <div class="w-lg-500px">
            @include('layouts.errors')
            @if(Session::has('status'))
                <div class="alert alert-success  pb-3 pt-3 mb-2">
                    <div class="d-flex">
                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.69477 2.48932C4.00472 2.74648 2.66565 3.98488 2.37546 5.66957C2.17321 6.84372 2 8.33525 2 10C2 11.6647 2.17321 13.1563 2.37546 14.3304C2.62456 15.7766 3.64656 16.8939 5 17.344V20.7476C5 21.5219 5.84211 22.0024 6.50873 21.6085L12.6241 17.9949C14.8384 17.9586 16.8238 17.7361 18.3052 17.5107C19.9953 17.2535 21.3344 16.0151 21.6245 14.3304C21.8268 13.1563 22 11.6647 22 10C22 8.33525 21.8268 6.84372 21.6245 5.66957C21.3344 3.98488 19.9953 2.74648 18.3052 2.48932C16.6859 2.24293 14.4644 2 12 2C9.53559 2 7.31411 2.24293 5.69477 2.48932Z"
                                      fill="#191213"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7 7C6.44772 7 6 7.44772 6 8C6 8.55228 6.44772 9 7 9H17C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7H7ZM7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H7Z"
                                      fill="#121319"></path>
                            </svg>
                        </span>
                        <div class="d-flex flex-column">
                            <h5 class="mb-1">Email Send Successfully</h5>
                            <span>{{ Session::get('status') }}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">

            <form class="form w-100" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="text-center mb-10">

                    <h1 class="text-dark mb-3">Forgot Password ?</h1>

                    {{--<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>--}}
                    <div class="text-gray-400 fw-bold fs-4">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</div>
                </div>

                <!-- Email Address -->
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-gray-900 fs-6 required" for="email">Email:</label>
                    <input id="email" class="form-control form-control-solid" type="email" value="{{ old('email') }}"
                           required autofocus name="email" autocomplete="off" placeholder="Enter Email"/>
                </div>

                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        <span class="indicator-label"> {{ __('Email Password Reset Link') }}</span>
                        <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
                </div>

            </form>

        </div>

    </div>
    <!--end::Main-->
@endsection
@push('scripts')
@endpush
