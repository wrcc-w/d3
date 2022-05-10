@extends('layouts.app')
@section('title')
    {{ __('messages.testimonials') }}
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700  livewire-table">
            <livewire:admin-testimonial-table/>
        </div>
        @include('landing.testimonial.create-modal')
        @include('landing.testimonial.edit-modal')
        @include('landing.testimonial.show')
    </div>
@endsection
@section('page_js')
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let profileError = "{{__('messages.testimonial.profile_error')}}"
        let defaultDocumentImageUrl = "{{ asset('assets/images/avatar.png') }}"
    </script>
    <script src="{{mix('assets/js/super_admin_testimonial/testimonial.js')}}"></script>
@endsection

