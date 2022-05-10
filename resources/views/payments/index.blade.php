@extends('layouts.app')
@section('title')
    {{__('messages.payments')}}
@endsection
@section('page_css')
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
    </div>
    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700 livewire-table">
             <livewire:admin-payment-table/>
            </div>
        </div>
    </div>
    @include('payments.payment_modal')
    @include('payments.edit_payment_modal')
@endsection
@section('page_js')
    <script>
        let currency = "{{ getCurrencySymbol() }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/payment/payment.js') }}"></script>
@endsection
