@extends('layouts.app')
@section('title')
    Currency
@endsection
@section('page_css')
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8 py-lg-10 px-lg-10 text-gray-700 livewire-table">
            <livewire:currency-table/>
        </div>
        @include('currencies.create_modal')
        @include('currencies.edit_modal')
    </div>
@endsection
@section('page_js')
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/currency/currency.js')}}"></script>
@endsection
