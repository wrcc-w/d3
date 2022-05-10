@extends('layouts.app')
@section('title')
    {{ __('messages.subscription_plans.transactions') }}
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body fs-6 py-8 px-8  px-lg-10 text-gray-700 livewire-table">
            <livewire:subscription-transaction-table/>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let subscriptionTransactionUrl = null;
        let hospitalUrl = "{{ url('super-admin/hospital') }}";
        let isSuperAdminLogin = "{{ getLoggedInUser()->hasRole('Super Admin') }}";
        let paid = "{{ \App\Models\Transaction::PAID }}";
        let unpaid = "{{ \App\Models\Transaction::UNPAID }}";
        let stripe = "{{ \App\Models\Subscription::PAYMENT_TYPES[1] }}";
        let paypal = "{{ \App\Models\Subscription::PAYMENT_TYPES[2] }}";
        if (isSuperAdminLogin)
            subscriptionTransactionUrl = "{{ route('subscriptions.transactions.index') }}";
        else
            subscriptionTransactionUrl = "{{ route('subscriptions.plans.transactions.index') }}";
    </script>
    <script src="{{mix('assets/js/subscriptions/subscriptions-transactions.js')}}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    {{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
@endsection
