@extends('client_panel.layouts.app')
@section('title')
    Transactions
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
    </div>
    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700 livewire-table">
               <livewire:client-transaction-table/>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script>
        let currency = "{{ getCurrencySymbol() }}";
    </script>
    <script src="{{ mix('assets/js/client_panel/transaction/transaction.js') }}"></script>
@endsection
