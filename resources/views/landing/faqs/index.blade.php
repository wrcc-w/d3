@extends('layouts.app')
@section('title')
    {{ __('messages.faqs.faqs') }}
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700 livewire-table">
            <livewire:faq-table/>
        </div>
    </div>
    @include('landing.faqs.create-modal')
    @include('landing.faqs.edit-modal')
    @include('landing.faqs.show')
    @include('landing.faqs.templates.templates')
@endsection
@section('scripts')
    <script src="{{mix('assets/js/faqs/faqs.js')}}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
@endsection
