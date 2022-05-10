@extends('layouts.app')
@section('title')
    {{ __('messages.subscribe.subscribers') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700  livewire-table">
            <livewire:subscriber-table/>
        </div>
    </div>
    @include('subscribe.templates.templates')
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/subscribe/subscribe.js')}}"></script>
@endsection
