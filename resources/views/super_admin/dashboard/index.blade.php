@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/dashboard.css') }}" type="text/css"/>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="row g-5 gx-xxl-8 mb-5 justify-content-center">
                {{-- Clients Widget --}}
                <div class="col-xl-3 col-md-6">
                    <a href="{{ route('users.index') }}"
                       class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-6">
                                <span class="rotate">
                                    <i class="fas fa-user display-4 card-icon text-white"></i>
                                </span>
                            <div class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5">
                                {{$data['users']}}
                            </div>
                            <div class="fw-bold text-inverse-danger fs-7">
                                {{ __('messages.total_users') }}
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Total Invoices Amount Widget --}}
                <div class="col-xl-3 col-md-6">
                    <a href="{{ route('subscriptions.transactions.index') }}"
                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-1">
                            <span class="rotate"><i class="fas fa-rupee-sign fa-4x display-4 card-icon text-white"></i></span>
                            <div class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">
                                <span>{{number_format($data['revenue'], 2)}}</div>
                            <div
                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.total_revenue') }}</div>
                        </div>
                    </a>
                </div>
                {{-- Recieved Amount Widget --}}
                <div class="col-xl-3 col-md-6">
                    <a href="{{ route('subscription-plans.index') }}"
                       class="card bg-success hoverable card-xl-stretch mb-xl-8 ">
                        <div class="card-body card-3">
                                <span class="rotate"><i
                                            class="fas fa-toggle-on fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-info fw-bolder card-count fs-2 mb-2 mt-5 amount-position"> {{$data['activeUserPlan']}}</div>
                            <div
                                    class="fw-bold text-inverse-info fs-7">{{ __('messages.total_active_user_plan') }}</div>
                        </div>
                    </a>
                </div>
                {{--Partially Paid Widget --}}
                <div class="col-xl-3 col-md-6">
                </div>
                {{-- Products Widget --}}

            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let currency = "{{ getCurrencySymbol() }}"
    </script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
@endsection
