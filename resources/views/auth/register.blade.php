@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
    </div>
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <a href="{{ url('/') }}" class="mb-12">
            <img alt="Logo" src="{{ getLogoUrl() }}" class="h-45px logo"/>
        </a>

        <div class="w-lg-600px">
            @include('layouts.errors')
            <div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-10 text-center">
                        <h1 class="text-dark mb-3">Create an Account</h1>

                        <div class="text-gray-400 fw-bold fs-4">Already have an account?
                            <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>

                    <div class="row fv-row mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="name">First Name:</label>
                            <input class="form-control form-control-lg form-control-solid" id="first_name"
                                   value="{{ old('first_name') }}" type="text" name="first_name"
                                   placeholder="First Name" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="last_name">Last
                                Name:</label>
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                   value="{{ old('last_name') }}" name="last_name" placeholder="Last Name"
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        </div>

                    </div>

                    <!-- Email Address -->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="email">Email:</label>
                        <input class="form-control form-control-lg form-control-solid" id="email"
                               value="{{ old('email') }}"
                               type="email" name="email" placeholder="Email" required autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">

                        <div class="mb-1">

                            <label class="form-label fw-bolder text-dark fs-6 required" for="password">Password:</label>

                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" id="password"
                                       type="password"
                                       name="password" placeholder="Password" autocomplete="new-password"/>
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                      data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
                            </div>

                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>

                        </div>

                        <div class="text-muted">Use 6 or more characters with a mix of letters, numbers &amp; symbols.
                        </div>

                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">

                        <div class="mb-1">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="password_confirmation">Confirm
                                Password:</label>
                            <div class="mb-3 position-relative">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                       id="password_confirmation" name="password_confirmation"
                                       placeholder="Confirm Password"
                                       autocomplete="off"/>
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                      data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>

                            </div>

                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>

                        </div>

                        <div class="text-muted">Use 6 or more characters with a mix of letters, numbers &amp;
                            symbols.
                        </div>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" required/>
                            <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label"> {{ __('Register') }}</span>
                            <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <!--end::Main-->
@endsection
