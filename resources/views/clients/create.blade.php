@extends('layouts.app')
@section('title')
    {{__('messages.client.add_client')}}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
@endsection
@section('header_toolbar')
    @php $styleCss = 'style'; @endphp
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('clients.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                    <div class="row">
                        <div class="col-12">
                            @include('layouts.errors')
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body p-12">
                            {{ Form::open(['route' => 'clients.store','files' => 'true','id'=>'clientForm']) }}
                            <div class="card-body p-9">
                                @include('clients.fields')
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let phoneNo = "{{ old('region_code').old('contact') }}";
        let isEdit = false;
        let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}";
        let defaultAvatarImageUrl = "{{ asset('assets/images/avatar.png') }}";
    </script>
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="{{ mix('assets/js/client/create-edit.js') }}"></script>
@endsection

