@extends('layouts.app')
@section('title')
    {{__('messages.clients')}}
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
               <livewire:client-table/>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/client/client.js') }}"></script>
@endsection
