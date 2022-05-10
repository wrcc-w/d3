@extends('layouts.app')
@section('title')
    {{ __('messages.enquiries') }}
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700 livewire-table">
          <livewire:super-admin-enquiry-table/>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let enquiryUrl = "{{ route('super.admin.enquiry.index') }}"
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/super_admin_enquiry/super_admin_enquiry.js') }}"></script>
@endsection
