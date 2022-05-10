@extends('layouts.app')
@section('title')
    {{ __('messages.taxes') }}
@endsection
@section('page_css')
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8 py-lg-10 px-lg-10 text-gray-700 livewire-table">
           <livewire:tax-table/>
        </div>
        @include('taxes.create_modal')
        @include('taxes.edit_modal')
    </div>
@endsection
@section('page_js')
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/tax/tax.js')}}"></script>
@endsection
