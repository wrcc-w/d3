@extends('client_panel.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('css')
    <link href="{{ mix('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="row g-5 gx-xxl-8 justify-content-center">
                {{-- Payments Widget --}}
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('client.invoices.index') }}"
                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-3">
                                <span class="rotate"><i
                                            class="fa fa-money-check fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-info fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{getCurrencySymbol()}} {{ numberFormat($total_payments) }} </div>
                            <div
                                    class="fw-bold text-inverse-info fs-7">{{ __('messages.admin_dashboard.total_payments') }}</div>
                        </div>
                    </a>
                </div>
                {{-- Paid Widget --}}
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('client.invoices.index',['status'=>2]) }}"
                       class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-8">
                                <span class="rotate"><i
                                            class="fas fa-money-bill-wave fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-dark fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ getCurrencySymbol() }}
                                &nbsp;{{ numberFormat($paid_amount) }}</div>
                            <div
                                    class="fw-bold text-inverse-dark fs-7">{{ __('messages.admin_dashboard.total_paid') }}</div>
                        </div>
                    </a>
                </div>
                {{-- Due Widget --}}
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('client.invoices.index',['status'=>3]) }}"
                       class="card bg-orangered hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-4">
                                <span class="rotate"><i
                                            class="fas fa-credit-card fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-danger fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ getCurrencySymbol() }}
                                &nbsp;{{ numberFormat($due_amount) }}</div>
                            <div
                                    class="fw-bold text-inverse-danger fs-7">{{ __('messages.admin_dashboard.total_due') }}</div>
                        </div>
                    </a>
                </div>
                {{-- Invoices Widget --}}
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('client.invoices.index') }}"
                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-1">
                            <span class="rotate"><i
                                        class="fas fa-file-invoice fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $total_invoices }}</div>
                            <div
                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.admin_dashboard.total_invoices') }}</div>
                        </div>
                    </a>
                </div>
                {{--Paid Widget --}}
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('client.invoices.index',['status'=>2]) }}"
                       class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-7">
                                <span class="rotate"><i
                                            class="fas fa-clipboard-check fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-dark fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $paid_invoices }}</div>
                            <div class="fw-bold text-inverse-dark fs-7">{{ __('messages.admin_dashboard.total_paid_invoices') }}</div>
                        </div>
                    </a>
                </div>
                {{--Unapid Widget --}}
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('client.invoices.index',['status'=>1]) }}"
                       class="card bg-orangered hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body card-5">
                            <span class="rotate"><i
                                        class="fas fa-exclamation-triangle fa-4x display-4 card-icon text-white"></i></span>
                            <div
                                    class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $unpaid_invoices }}</div>
                            <div
                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.admin_dashboard.total_unpaid_invoices') }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
