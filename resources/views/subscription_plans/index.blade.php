@extends('layouts.app')
@section('title')
    {{__('messages.subscription_plan')}}
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
            <div class="card-body livewire-table">
                <livewire:subscription-plan-table/>
            </div>
        </div>
    </div>
    @include('subscription_plans.templates.templates')
@endsection
@section('page_js')
    <script>
        let subscriptionPlanUrl = "{{ route('subscription-plans.index') }}"
        let subscriptionPlanUrlDefault = "{{ url('subscription-plans') }}"
        let subscriptionPlanUrlDefaultShow = "{{ url('super-admin/subscription-plans') }}"
    </script>
    <script src="{{ mix('assets/js/subscription_plans/subscription_plan.js') }}"></script>
@endsection




