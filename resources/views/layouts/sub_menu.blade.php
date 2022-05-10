<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('*/dashboard*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('*/dashboard*') ? 'show' : ''  }}">
        @hasrole('admin')
        <a class="menu-link py-3 "
           href="{{ route('admin.dashboard') }}">
            <span class="menu-title">{{ __('messages.dashboard') }}</span>
        </a>
        @endrole
        @hasrole('client')
        <a class="menu-link py-3 "
           href="{{ route('client.dashboard') }}">
            <span class="menu-title">{{ __('messages.dashboard') }}</span>
        </a>
        @endrole
    </div>
</div>
@role('super_admin')
{{-- Super Admin Dashboard Sub Menu --}}
<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/dashboard*')) ? 'd-none' : '' }}"
     id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/dashboard*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('super.admin.dashboard') }}">
            <span class="menu-title">{{ __('messages.dashboard') }}</span>
        </a>
    </div>
</div>

<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/users*')) ? 'd-none' : '' }}"
     id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/users*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('users.index') }}">
            <span class="menu-title">{{ __('messages.users') }}</span>
        </a>
    </div>
</div>

<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/enquiries*')) ? 'd-none' : '' }}"
     id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/enquiries*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('super.admin.enquiry.index') }}">
            <span class="menu-title">{{ __('messages.enquiries') }}</span>
        </a>
    </div>
</div>

{{-- Super Admin Landing CMS Section One Sub Menu --}}
<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/section-one*','super-admin/section-two*','super-admin/section-three*','super-admin/faqs*','super-admin/admin-testimonial*')) ? 'd-none' : '' }}"
     id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/section-one*') ? 'show' : ''  }}">
        <a class="menu-link py-3 " href="{{ route('super.admin.section.one') }}">
            <span class="menu-title">{{ __('messages.landing_cms.section_one') }}</span>
        </a>
    </div>
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/section-two*') ? 'show' : ''  }}">
        <a class="menu-link py-3 " href="{{ route('super.admin.section.two') }}">
            <span class="menu-title">{{ __('messages.landing_cms.section_two') }}</span>
        </a>
    </div>
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/section-three*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('super.admin.section.three') }}">
            <span class="menu-title">{{ __('messages.landing_cms.section_three') }}</span>
        </a>
    </div>
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/faqs*') ? 'show' : ''  }}">
        <a class="menu-link py-3 " href="{{ route('faqs.index') }}">
            <span class="menu-title">{{ __('messages.faqs.faqs') }}</span>
        </a>
    </div>
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/admin-testimonial') ? 'show' : ''  }}">
        <a class="menu-link py-3 " href="{{ route('admin-testimonial.index') }}">
            <span class="menu-title">{{ __('messages.testimonials') }}</span>
        </a>
    </div>
</div>

<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/subscriber*')) ? 'd-none' : '' }}"
     id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('super-admin/subscriber*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('super.admin.subscribe.index') }}">
            <span class="menu-title">{{ __('messages.subscribe.subscribers') }}</span>
        </a>
    </div>
</div>

@endrole
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/clients*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('admin/clients*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('clients.index') }}">
            <span class="menu-title">{{ __('messages.clients') }}</span>
        </a>
    </div>
</div>
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('subscription-plans*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('subscription-plans*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('subscription.pricing.plans.index') }}">
            <span class="menu-title">{{ __('messages.subscription_plan') }}</span>
        </a>
    </div>
</div>
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('choose-payment-type*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('choose-payment-type*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('subscription.pricing.plans.index') }}">
            <span class="menu-title">{{ __('messages.subscription_plan') }}</span>
        </a>
    </div>
</div>
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/category*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('admin/category*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('category.index') }}">
            <span class="menu-title">{{ __('messages.categories') }}</span>
        </a>
    </div>
</div>
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/taxes*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('admin/taxes*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('taxes.index') }}">
            <span class="menu-title">{{ __('messages.taxes') }}</span>
        </a>
    </div>
</div>
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/products*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('admin/products*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('products.index') }}">
            <span class="menu-title">{{ __('messages.products') }}</span>
        </a>
    </div>
</div>
@role('admin')
<div
        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/transactions*')) ? 'd-none' : '' }}"
        id="#kt_header_menu" data-kt-menu="true">
    <div class="menu-item me-lg-1 {{ Request::is('admin/transactions*') ? 'show' : ''  }}">
        <a class="menu-link py-3 "
           href="{{ route('transactions.index') }}">
            <span class="menu-title">{{ __('messages.transactions') }}</span>
        </a>
    </div>
</div>
@else
    <div
            class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('client/transactions*')) ? 'd-none' : '' }}"
            id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 {{ Request::is('client/transactions*') ? 'show' : ''  }}">
            <a class="menu-link py-3 "
               href="{{ route('client.transactions.index') }}">
                <span class="menu-title">{{ __('messages.transactions') }}</span>
            </a>
        </div>
    </div>
    @endrole
    <div
            class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('*/invoices*')) ? 'd-none' : '' }}"
            id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 {{ Request::is('*/invoices*') ? 'show' : ''  }}">
            @role('admin')
            <a class="menu-link py-3 "
               href="{{ route('invoices.index') }}">
                <span class="menu-title">{{ __('messages.invoices') }}</span>
            </a>
            @endrole
            @role('client')
            <a class="menu-link py-3 "
               href="{{ route('client.invoices.index') }}">
                <span class="menu-title">{{ __('messages.invoices') }}</span>
            </a>
            @endrole
        </div>
    </div>
    <div
            class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/settings*', 'admin/currencies*','admin/payment-gateway*')) ? 'd-none' : '' }}"
            id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 {{ isset($sectionName)?($sectionName == 'general' ? 'show' : ''):'' }}">
            <a class="menu-link py-3"
               href="{{ route('settings.edit',['section' => 'general']) }}">
                <span class="menu-title">{{ __('messages.general') }}</span>
            </a>
        </div>
        <div class="menu-item me-lg-1 {{ Request::is('admin/currencies*') ? 'show' : '' }}">
            <a href="{{ route('currencies.index') }}"
               class="menu-link py-3">
                {{ __('messages.setting.currencies') }}
            </a>
        </div>
        <div class="menu-item me-lg-1 {{ Request::is('admin/payment-gateway*') ? 'show' : '' }}">
            <a href="{{ route('payment-gateway.show') }}"
               class="menu-link py-3">
                {{ __('messages.setting.payment-gateway') }}
            </a>
        </div>
    </div>
    <div
            class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/template-setting*')) ? 'd-none' : '' }}"
            id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 {{ Request::is('admin/template-setting*') ? 'show' : '' }}">
            <a href="{{ route('invoiceTemplate') }}"
               class="menu-link py-3">
                {{__('messages.invoice_templates')}}
            </a>
        </div>
    </div>
@role('admin')
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('admin/payments*')) ? 'd-none' : '' }}" id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 show">
            <a class="menu-link py-3" href="{{ route('payments.index') }}">
                <span class="menu-title">{{ __('messages.payments') }}</span>
            </a>
        </div>
    </div>
    @endrole


    @role('super_admin')
    {{-- Super Admin Subscription Sub Menu --}}
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/subscription-plans*', 'super-admin/transactions*')) ? 'd-none' : '' }}" id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 {{ Request::is('super-admin/subscription-plans*') ? 'show' : ''  }}">
            <a class="menu-link py-3 " href="{{ route('subscription-plans.index') }}">
                <span class="menu-title">{{ __('messages.subscription_plans.subscription_plans') }}</span>
            </a>
        </div>
        <div class="menu-item me-lg-1 {{ Request::is('super-admin/transactions*') ? 'show' : ''  }}">
            <a class="menu-link py-3 {{ Request::is('super-admin/transactions*') ? 'active' : '' }}"
               href="{{ route('subscriptions.transactions.index') }}">
                <span class="menu-title">{{ __('messages.subscription_plans.transactions') }}</span>
            </a>
        </div>
    </div>

    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch {{ (!Request::is('super-admin/general-settings*','super-admin/footer-settings*')) ? 'd-none' : '' }}"
         id="#kt_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1 {{ Request::is('super-admin/general-settings*') ? 'show' : ''  }}">
            <a class="menu-link py-3 " href="{{ route('super.admin.settings.edit') }}">
                <span class="menu-title">{{ __('messages.settings') }}</span>
            </a>
        </div>
        <div class="menu-item me-lg-1 {{ Request::is('super-admin/footer-settings*') ? 'show' : ''  }}">
            <a class="menu-link py-3 "
               href="{{ route('super.admin.footer.settings.edit') }}">
                <span class="menu-title">{{ __('messages.footer_setting.footer_settings') }}</span>
            </a>
        </div>
    </div>

    @endrole
