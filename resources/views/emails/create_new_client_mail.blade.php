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
        <h2>Welcome to {{ $clientName }}, <b></b></h2><br>
        <p>Your account has been successfully created on {{ getAppName() }}</p>
        <p>Your email address is <strong>{{ $userName }}</strong></p>
        <p>Your account password is <strong>{{ $password  }}</strong></p>
        <p>In {{ getAppName() }}, you can manage all of your invoices.</p>
        <p>Thank for joining and have a great day!</p><br>
        <div {{$styleCss}}="display: flex;justify-content: center">
        <a href="{{ route('login') }}"
        {{$styleCss}}="
        padding: 7px 15px;text-decoration: none;font-size: 14px;background-color: #df4645;font-weight: 500;border: none;border-radius: 8px;color: white
        ">
        login to {{ getAppName() }}
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
