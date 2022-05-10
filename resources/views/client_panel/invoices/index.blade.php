@extends('client_panel.layouts.app')
@section('title')
    Invoices
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
    </div>
    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-body fs-6 py-8 px-8 px-lg-10 text-gray-700 livewire-table">
                <livewire:client-invoice-table/>
            </div>
        </div>
    </div>
    @include('client_panel.invoices.payment_modal')
@endsection
@section('page_js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        let currency = "{{ getCurrencySymbol() }}"
        @if(getStripeKey())
        let stripe = Stripe('{{ getStripeKey() }}')
        @endif
        let invoiceStripePaymentUrl = '{{ route('client.stripe-payment') }}'
        let status = "{{ $status }}"
        let options = {
            'key': "{{ config('payments.razorpay.key') }}",
            'amount': 0, //  100 refers to 1
            'currency': 'INR',
            'name': "{{getAppName()}}",
            'order_id': '',
            'description': '',
            'image': '{{ asset(getLogoUrl()) }}', // logo here
            'callback_url': "{{ route('razorpay.success') }}",
            'prefill': {
                'email': '', // client email here
                'name': '', // client name here
                'invoiceId': '', //invoice id
            },
            'readonly': {
                'name': 'true',
                'email': 'true',
                'invoiceId': 'true',
            },
            'theme': {
                'color': '#4FB281',
            },
            'modal': {
                'ondismiss': function () {
                    $('#paymentForm').modal('hide');
                    displayErrorMessage('Payment not completed.');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
            },
        };
    </script>
    <script src="{{ mix('assets/js/client_panel/invoice/invoice.js') }}"></script>
@endsection
