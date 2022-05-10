@role('super_admin')
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
    <a class="menu-link {{ Request::is('super-admin/dashboard*') ? 'active' : '' }}"
       href="{{ route('super.admin.dashboard') }}">
        <span class="menu-icon">
            <i class="bi bi-house fs-3"></i>
        </span>
        <span class="menu-title">{{ __('messages.dashboard') }}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('super-admin/users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
        <span class="menu-icon">
            <i class="fas fa-users fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.users')}}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('super-admin/subscription-plan*','super-admin/transactions*') ? 'active' : '' }}"
       href="{{ route('subscription-plans.index') }}">
        <span class="menu-icon">
            <i class="fas fa-rupee-sign"></i>
        </span>
        <span class="menu-title">{{__('messages.subscription_plan')}}</span>
    </a>
</div>
<div class="menu-item side-menus">
    <a class="menu-link menu-text-wrap {{ Request::is('super-admin/enquiries*') ? 'active' : '' }}"
       href="{{ route('super.admin.enquiry.index') }}">
        <span class="menu-icon">
            <i class="fab fa-elementor"></i>
		</span>
        <span class="menu-title">{{ __('messages.enquiries') }}</span>
    </a>
</div>
{{-- Subscribers --}}
<div class="menu-item side-menus">
    <a class="menu-link menu-text-wrap {{ Request::is('super-admin/subscribers*') ? 'active' : '' }}"
       href="{{ route('super.admin.subscribe.index') }}">
        <span class="menu-icon">
            <i class="fab fa-stripe-s"></i>
		</span>
        <span class="menu-title">{{ __('messages.subscribe.subscribers') }}</span>
    </a>
</div>


{{-- Landing Screen Section One --}}
<div class="menu-item side-menus">
    <a class="menu-link menu-text-wrap {{ Request::is('super-admin/section-one*','super-admin/section-two*','super-admin/section-three*','super-admin/admin-testimonial*','super-admin/faqs*') ? 'active' : '' }}"
       href="{{ route('super.admin.section.one') }}">
        <span class="menu-icon">
            <i class="fas fa fa-cog"></i>
		</span>
        <span class="menu-title">{{ __('messages.landing_cms.landing_cms') }}</span>
    </a>
</div>

{{-- Settings --}}
<div class="menu-item menu-accordion side-menus">
    <a class="menu-link menu-text-wrap {{ Request::is('super-admin/general-settings*','super-admin/footer-settings*') ? 'active' : '' }}"
       href="{{ route('super.admin.settings.edit') }}">
        <span class="menu-icon"><i class="fa fa-cogs"></i></span>
        <span class="menu-title">{{ __('messages.settings') }}</span>
        <span class="d-none">{{ __('messages.general') }}</span>
        <span class="d-none">{{ __('messages.sidebar_setting') }}</span>
    </a>
</div>

@endrole
@role('admin')
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
    <a class="menu-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
       href="{{ route('admin.dashboard') }}">
        <span class="menu-icon">
            <i class="bi bi-house fs-3"></i>
        </span>
        <span class="menu-title">{{ __('messages.dashboard') }}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/client*') ? 'active' : '' }}" href="{{ route('clients.index') }}">
        <span class="menu-icon">
            <i class="fas fa-user-alt fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.clients')}}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/category*') ? 'active' : '' }}"
       href="{{ route('category.index') }}">
        <span class="menu-icon">
            <i class="fas fa-th-list fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.categories')}}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/taxes*') ? 'active' : '' }}" href="{{ route('taxes.index') }}">
        <span class="menu-icon">
           <i class="fas fa-percentage fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.taxes')}}</span>
    </a>
</div>


<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/products*') ? 'active' : '' }}"
       href="{{ route('products.index') }}">
        <span class="menu-icon">
            <i class="fas fa-cube fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.products')}}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/invoices*') ? 'active' : '' }}"
       href="{{ route('invoices.index') }}">
        <span class="menu-icon">
            <i class="far fa-file-alt fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.invoices')}}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/transactions*') ? 'active' : '' }}"
       href="{{ route('transactions.index') }}">
        <span class="menu-icon">
           <i class="fas fa-list-ol fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.transactions')}}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/payments*') ? 'active' : '' }}"
       href="{{ route('payments.index') }}">
        <span class="menu-icon">
            <i class="fas fa-money-check fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.payments')}}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/template-setting*') ? 'active' : '' }}"
       href="{{ route('invoiceTemplate') }}">
        <span class="menu-icon">
          <i class="far fa-copy fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.invoice_templates')}}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('admin/settings*', 'admin/currencies*','admin/payment-gateway*') ? 'active' : '' }}"
       href="{{ route('settings.edit') }}">
        <span class="menu-icon">
           <i class="fa fa-cogs fs-3"></i>
        </span>
        <span class="menu-title">{{__('messages.settings')}}</span>
    </a>
</div>
@endrole

@role('client')
@include('client_panel.layouts.menu')
@endrole

