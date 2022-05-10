<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@extends('layouts.auth')
@section('title')
    
@endsection
@section('content')
{{--    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">--}}
{{--        --}}
{{--        <a href="{{ route('dashboard') }}" class="mb-12">--}}
{{--            <img alt="Logo" src="{{ asset('web/media/logos/logo-2-dark.svg') }}" class="h-45px" />--}}
{{--        </a>--}}

{{--        <div class="w-lg-550px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">--}}

{{--            <form class="form w-100"  method="POST" action="{{ route('password.confirm') }}">--}}
{{--                @csrf--}}
{{--                <div class="text-center mb-10">--}}
{{--             --}}
{{--                    <h1 class="text-dark mb-3">Setup New Password</h1>--}}
{{--      --}}
{{--                    <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?--}}
{{--                        <a href="{{ route('register') }}" class="link-primary fw-bolder">Sign in here</a></div>--}}
{{--             --}}
{{--                </div>--}}

{{--                <div class="mb-10 fv-row" data-kt-password-meter="true">--}}
{{--               --}}
{{--                    <div class="mb-1">--}}
{{--                --}}
{{--                        <label class="form-label fw-bolder text-dark fs-6">Password</label>--}}

{{--                        <div class="position-relative mb-3">--}}
{{--                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />--}}
{{--                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">--}}
{{--											<i class="bi bi-eye-slash fs-2"></i>--}}
{{--											<i class="bi bi-eye fs-2 d-none"></i>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--   --}}
{{--                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">--}}
{{--                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>--}}
{{--                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>--}}
{{--                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>--}}
{{--                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>--}}
{{--                        </div>--}}
{{--                 --}}
{{--                    </div>--}}

{{--                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>--}}

{{--                </div>--}}

{{--                <div class="fv-row mb-10">--}}
{{--                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>--}}
{{--                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />--}}
{{--                </div>--}}

{{--                <div class="fv-row mb-10">--}}
{{--                    <div class="form-check form-check-custom form-check-solid form-check-inline">--}}
{{--                        <input class="form-check-input" type="checkbox" name="toc" value="1" />--}}
{{--                        <label class="form-check-label fw-bold text-gray-700 fs-6">I Agree &amp;--}}
{{--                            <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</label>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="text-center">--}}
{{--                    <button type="submit" class="btn btn-lg btn-primary fw-bolder">--}}
{{--                        <span class="indicator-label">{{ __('Confirm') }}</span>--}}
{{--                        <span class="indicator-progress">Please wait...--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--        --}}
{{--            </form>--}}
{{--     --}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
