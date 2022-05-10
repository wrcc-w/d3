@extends('layouts.app')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            @yield('section')
        </div>
    </div>
    @include('settings.invoices.templates')
@endsection
@section('page_js')
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
        let imageValidation = '{{  __('messages.setting.image_validation') }}';
        let companyImageValidation = '{{ __('messages.setting.company_image_validation') }}';
    </script>
    <script src="{{ mix('assets/js/settings/setting.js') }}"></script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
