<div class="position-relative mb-5 mx-3 mt-2 sidebar-search-box">
    <span class="svg-icon svg-icon-1 svg-icon-primary position-absolute top-50 translate-middle ms-9">
                                                            <svg xmlns="https://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="17.0365" y="15.1223"
                                                                      width="8.15546" height="2" rx="1"
                                                                      transform="rotate(45 17.0365 15.1223)"
                                                                      fill="black"></rect>
                                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                      fill="black"></path>
                                                            </svg>
                                                        </span>
    <input type="text" class="form-control form-control-lg form-control-solid ps-15" id="menuSearch" name="search"
           value="" placeholder="Search" {{ $styleCss }}="background-color: #2A2B3A;border: none;color: #FFFFFF"
           autocomplete="off">
</div>
<div class="no-record text-white text-center d-none">No matching records found</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('client/dashboard*') ? 'active' : '' }}"
       href="{{ route('client.dashboard') }}">
        <span class="menu-icon">
            <i class="bi bi-house fs-3"></i>
        </span>
        <span class="menu-title">{{ __('messages.dashboard') }}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ Request::is('client/invoices*') ? 'active' : '' }}"
       href="{{ route('client.invoices.index') }}">
        <span class="menu-icon">
            <i class="far fa-file-alt fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.invoices')}}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('client/transactions*') ? 'active' : '' }}"
       href="{{ route('client.transactions.index') }}">
        <span class="menu-icon">
            <i class="fas fa-money-check fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.transactions')}}</span>
    </a>
</div>
