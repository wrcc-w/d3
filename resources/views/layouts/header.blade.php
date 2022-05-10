@php
    $notifications = getNotification();
    $notificationCount = count($notifications);
    $styleCss = 'style';

@endphp
<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                <i class="bi bi-list fs-1"></i>
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                <img alt="Logo" src="{{ getLogoUrl() }}" class="h-15px"/>
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                     data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                     data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    @include('layouts.sub_menu')
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex">
                <div class="d-flex align-items-stretch">
                    <div class="topbar-item position-relative p-8 d-flex align-items-center hoverable">
                        @if(Auth::user()->dark_mode)
                            <a href="{{ route('update-dark-mode') }}" title="Switch to Light mode"><i
                                        class="far fa-moon fs-3 theme-btn-color"></i></a>
                        @else
                            <a href="{{ route('update-dark-mode') }}" title="Switch to Dark mode"><i
                                        class="fas fa-sun fs-3 theme-btn-color"></i></a>
                        @endif
                    </div>
                    <div class="topbar-item position-relative p-8 d-flex align-items-center hoverable"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                         data-kt-menu-flip="bottom">
                        <i class="far fa-bell fs-3"></i>
                        @if(count(getNotification()) != 0)
                            <span
                                    class="badge navbar-badge bg-primary notification-count notification-message-counter rounded-circle position-absolute translate-middle d-flex justify-content-center align-items-center {{($notificationCount > 9)?'end-0':'counter-0'}}"
                                    id="counter">{{ count(getNotification()) }}</span>
                        @endif
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px h-400px"
                         data-kt-menu="true">
                        {{--                        <div class="d-flex justify-content-between bgi-no-repeat rounded-top"--}}
                        {{--                             {{ $styleCss }}="background-image:url({{ asset('assets/img/pattern-1.jpeg') }})">--}}
                        <div class="d-flex justify-content-between bgi-no-repeat rounded-top position-sticky"
                             {{ $styleCss }}="background-color:#009ef7">
                            <h3 class="text-white fw-bold px-9 px-sm-6 mt-7 mb-5">{{__('messages.notification.notifications')}}
                                <span class="fs-8 opacity-75 ps-3 text-right" {{ $styleCss }}="margin-left: 90px;">
                                @if(count(getNotification()) > 0)
                                    <a href="#" class="read-all-notification text-white" id="readAllNotification">
                                        {{ __('messages.notification.mark_all_as_read') }}</a>
                                @endif
                                </span>
                            </h3>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons force-scroll overflow-auto">
                            @if($notificationCount > 0)
                                @foreach($notifications as $notification)
                                    <a data-id="{{ $notification->id }}"
                                       class="notification text-hover-primary cursor-default" id="notification">
                                        <div class="scroll-y mh-325px my-5 px-5">
                                            <div class="d-flex flex-stack py-4">
                                                <div class="d-flex">
                                                    <div class="symbol symbol-35px me-4">
                                                    <span class="symbol-label bg-light-primary">
                                                      <i class="{{ getNotificationIcon($notification->type) }}"></i>
                                                    </span>
                                                    </div>
                                                    @php
                                                        $datework = Carbon\Carbon::parse($notification->created_at);
                                                        $now = Carbon\Carbon::now();
                                                        $diff = $datework->diffForHumans($now);
                                                    @endphp
                                                    <div class="mb-0 me-2 text-hover-primary">
                                                        <span class="fs-6 text-gray-800 fw-bold text-hover-primary">{{ $notification->title }}<span
                                                                class="badge badge-light fs-8 float-end">{{$diff}}</span></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="empty-state fs-6 text-gray-800 fw-bold text-center mt-5" data-height="400">
                                    <p>{{ __('messages.notification.you_don`t_have_any_new_notification') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="empty-state empty-notification d-none fs-6 text-gray-800 fw-bold text-center mt-5"
                             data-height="400">
                            <p>{{ __('messages.notification.you_don`t_have_any_new_notification') }}</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-stretch flex-shrink-0">
                        <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                 data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                 data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                <img class="object-fit-cover" src="{{ getLogInUser()->profile_image }}" alt="metronic"/>
                            </div>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                 data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="{{ getLogInUser()->profile_image }}"
                                                 class="object-fit-cover"/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">{{getLogInUser()->full_name}}
                                            </div>
                                            <a href="#"
                                               class="fw-bold text-muted text-hover-primary fs-7">{{getLogInUser()->email}}</a>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5 my-1">
                                    <a href="{{ route('profile.setting') }}" class="menu-link px-5">{{ __('messages.user.account_setting') }}</a>
                                </div>
                                @if(getLoggedInUser()->hasRole('admin'))
                                    <div class="menu-item px-5">
                                        <a href="{{ route('subscription.pricing.plans.index') }}" class="menu-link px-5 subscription_plan">
                                            {{__('messages.subscription_plans.subscription_plans')}}
                                        </a>
                                    </div>
                            @endif
                            <!--end::Menu item-->
                                <div class="menu-item px-5">
                                    <a class="menu-link px-5 " id="changePassword">{{ __('messages.user.change_password') }}</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                     data-kt-menu-placement="left-start" data-kt-menu-flip="bottom">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">{{__('messages.language')}}
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        @foreach(getUserLanguages() as $key => $value)
                                            <div class="menu-item px-3">
                                                <a class="menu-link d-flex px-5 changeLanguage {{ getLogInUser()->language == $key ? 'active' : ''}}"
                                                   data-prefix-value="{{ $key }}">
                                                    @foreach(\App\Models\User::LANGUAGES_IMAGE as $imageKey=> $imageValue)
                                                        @if($imageKey == $key)
                                                            <img class="w-15px h-15px rounded-1 ms-2"
                                                                 src="{{asset($imageValue)}}"/>
                                                        @endif
                                                    @endforeach
                                                    <span class="symbol symbol-20px me-4 ">
                                                </span>{{ $value }}</a>
                                            </div>
                                    @endforeach
                                    <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <form id="logout-form" action="{{ route('logout')}}" method="post">
                                        @csrf
                                    </form>
                                    <a href="{{route('logout')}}"
                                       onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();"
                                       class="menu-link px-5"> {{__('messages.sign_out')}}</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User -->
                        <!--begin::Heaeder menu toggle-->
                        <div class="d-flex align-items-center d-lg-none px-4 me-n3" title="Show header menu">
                            <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                <i class="bi bi-text-left fs-1"></i>
                            </div>
                        </div>
                        <!--end::Heaeder menu toggle-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Topbar-->
            </div>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
