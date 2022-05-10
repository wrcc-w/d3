@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getLogoUrl()) }}" class="logo" alt="{{ getAppName() }}">
        @endcomponent
    @endslot
    @php
        $styleCss = 'style';
    @endphp

    {{-- Body --}}
    <div>
        <h2>Dear {{ $clientFullName }}, <b></b></h2><br>
        <p>I hope you are well.</p>
        <p>I just wanted to drop you a quick note to remind you that <b>{{ numberFormat($totalDueAmount) }}</b> in
            respect of our
            invoice <b>{{ $invoiceNumber }}</b> is due for payment on <b>{{ $dueDate }}</b>.</p>
        <br>
        <div {{$styleCss}}="display: flex;justify-content: center">
        <a href="{{route('client.invoices.show',['invoice'=>$invoiceId])}}"
        {{$styleCss}}="
        padding: 7px 15px;text-decoration: none;font-size: 14px;background-color: green ;font-weight: 500;border: none;border-radius: 8px;color: white
        ">
        View Invoice
        </a>
    </div>
    </div>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
