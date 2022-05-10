@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    @php $styleCss = 'style'; @endphp

    <!--begin::Wrapper-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->
            <div class="toolbar" id="kt_toolbar">
                <!--begin::Container-->
                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                         data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                         class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                        <!--begin::Title-->
                        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
                            <!--begin::Separator-->
                            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                            <!--end::Separator-->
                            <!--begin::Description-->
                            <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
                            <!--end::Description--></h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center py-1">
                        <!--begin::Wrapper-->
                        <div class="me-4">
                            <!--begin::Menu-->
                            <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                               data-kt-menu-flip="top-end">
                                <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="https://www.w3.org/2000/svg"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                              fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                                <!--end::Svg Icon-->Filter</a>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid" data-kt-select2="true"
                                                    data-placeholder="Select option" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1"/>
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                       checked="checked"/>
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   name="notifications" checked="checked"/>
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2"
                                                data-kt-menu-dismiss="true">Reset
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                                data-kt-menu-dismiss="true">Apply
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                           data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
                        <!--end::Button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container">
                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xxl-4">
                            <!--begin::Mixed Widget 2-->
                            <div class="card card-xxl-stretch">
                                <!--begin::Header-->
                                <div class="card-header border-0 bg-danger py-5">
                                    <h3 class="card-title fw-bolder text-white">Sales Statistics</h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                             data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Payments
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="Specify a target name for future usage and reference"></i></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                 data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                       type="checkbox" value="1" checked="checked"
                                                                       name="notifications"/>
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <!--begin::Chart-->
                                    <div class="mixed-widget-2-chart card-rounded-bottom bg-danger"
                                         data-kt-color="danger" {{ $styleCss }}="height: 200px"></div>
                                <!--end::Chart-->
                                <!--begin::Stats-->
                                <div class="card-p mt-n20 position-relative">
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                         width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                  height="16" rx="1.5"/>
                                                            <rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                  rx="1.5"/>
                                                            <rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                  rx="1.5"/>
                                                            <rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                  rx="1.5"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            <!--end::Svg Icon-->
                                            <a href="#" class="text-warning fw-bold fs-6">Weekly Sales</a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                    <svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
                                                        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                              fill="#000000" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
                                            <!--end::Svg Icon-->
                                            <a href="#" class="text-primary fw-bold fs-6">New Users</a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                            <!--begin::Svg Icon | path: icons/duotone/Design/Layers.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                    <svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                              fill="#000000" fill-rule="nonzero"/>
                                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                              fill="#000000" opacity="0.3"/>
                                                    </svg>
                                                </span>
                                            <!--end::Svg Icon-->
                                            <a href="#" class="text-danger fw-bold fs-6 mt-2">Item Orders</a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-success px-6 py-8 rounded-2">
                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                    <svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                                              fill="#000000" opacity="0.3"/>
                                                        <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                                              fill="#000000"/>
                                                    </svg>
                                                </span>
                                            <!--end::Svg Icon-->
                                            <a href="#" class="text-success fw-bold fs-6 mt-2">Bug Reports</a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-4">
                            <!--begin::List Widget 5-->
                            <div class="card card-xxl-stretch">
                                <!--begin::Header-->
                                <div class="card-header align-items-center border-0 mt-4">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="fw-bolder mb-2 text-dark">Activities</span>
                                        <span class="text-muted fw-bold fs-7">890,344 Sales</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                             data-kt-menu="true">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Menu separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Form-->
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold">Status:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <div>
                                                        <select class="form-select form-select-solid"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-allow-clear="true">
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold">Member Type:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <div class="d-flex">
                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox" value="1"/>
                                                            <span class="form-check-label">Author</span>
                                                        </label>
                                                        <!--end::Options-->
                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                   checked="checked"/>
                                                            <span class="form-check-label">Customer</span>
                                                        </label>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold">Notifications:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               name="notifications" checked="checked"/>
                                                        <label class="form-check-label">Enabled</label>
                                                    </div>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                            class="btn btn-sm btn-white btn-active-light-primary me-2"
                                                            data-kt-menu-dismiss="true">Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-menu-dismiss="true">Apply
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!--begin::Timeline-->
                                    <div class="timeline-label">
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">08:42</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-warning fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Text-->
                                            <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you
                                                honest. And keep structure
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">10:00</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-success fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Content-->
                                            <div class="timeline-content d-flex">
                                                <span class="fw-bolder text-gray-800 ps-3">AEOL meeting</span>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">14:37</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-danger fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Desc-->
                                            <div class="timeline-content fw-bolder text-gray-800 ps-3">Make deposit
                                                <a href="#" class="text-primary">USD 700</a>. to ESL
                                            </div>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-primary fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Text-->
                                            <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly
                                                driving and keep structure keep great
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-danger fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Desc-->
                                            <div class="timeline-content fw-bold text-gray-800 ps-3">New order placed
                                                <a href="#" class="text-primary">#XF-2356</a>.
                                            </div>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-primary fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Text-->
                                            <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly
                                                driving and keep structure keep great
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-danger fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Desc-->
                                            <div class="timeline-content fw-bold text-gray-800 ps-3">New order placed
                                                <a href="#" class="text-primary">#XF-2356</a>.
                                            </div>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="timeline-item">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">10:30</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-success fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Text-->
                                            <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI Mobile
                                                app launch preparion meeting
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Timeline-->
                                </div>
                                <!--end: Card Body-->
                            </div>
                            <!--end: List Widget 5-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-4">
                            <!--begin::Mixed Widget 7-->
                            <div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column p-0">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1 card-p pb-0">
                                        <div class="d-flex flex-stack flex-wrap">
                                            <div class="me-2">
                                                <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Generate
                                                    Reports</a>
                                                <div class="text-muted fs-7 fw-bold">Finance and accounting reports
                                                </div>
                                            </div>
                                            <div class="fw-bolder fs-3 text-primary">$24,500</div>
                                        </div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Chart-->
                                    <div class="mixed-widget-7-chart card-rounded-bottom" data-kt-chart-color="primary"
                                         {{ $styleCss }}="height: 150px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 7-->
                            <!--begin::Mixed Widget 10-->
                            <div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                                    <!--begin::Hidden-->
                                    <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
                                        <div class="me-2">
                                            <span class="fw-bolder text-gray-800 d-block fs-3">Sales</span>
                                            <span class="text-gray-400 fw-bold">Oct 8 - Oct 26 21</span>
                                        </div>
                                        <div class="fw-bolder fs-3 text-primary">$15,300</div>
                                    </div>
                                    <!--end::Hidden-->
                                    <!--begin::Chart-->
                                    <div class="mixed-widget-10-chart" data-kt-color="primary"
                                         {{ $styleCss }}="height: 175px"></div>
                                    <!--end::Chart-->
                                </div>
                            </div>
                            <!--end::Mixed Widget 10-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row gy-5 gx-xl-8">
                        <!--begin::Col-->
                        <div class="col-xxl-4">
                            <!--begin::List Widget 3-->
                            <div class="card card-xxl-stretch mb-xl-3">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title fw-bolder text-dark">Todo</h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                             data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Payments
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="Specify a target name for future usage and reference"></i></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                 data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                       type="checkbox" value="1" checked="checked"
                                                                       name="notifications"/>
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Bullet-->
                                        <span class="bullet bullet-vertical h-40px bg-success"></span>
                                        <!--end::Bullet-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid mx-5">
                                            <input class="form-check-input" type="checkbox" value=""/>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Description-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Create
                                                FireStone Logo</a>
                                            <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                                        </div>
                                        <!--end::Description-->
                                        <span class="badge badge-light-success fs-8 fw-bolder">New</span>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Bullet-->
                                        <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                        <!--end::Bullet-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid mx-5">
                                            <input class="form-check-input" type="checkbox" value=""/>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Description-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Stakeholder
                                                Meeting</a>
                                            <span class="text-muted fw-bold d-block">Due in 3 Days</span>
                                        </div>
                                        <!--end::Description-->
                                        <span class="badge badge-light-primary fs-8 fw-bolder">New</span>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Bullet-->
                                        <span class="bullet bullet-vertical h-40px bg-warning"></span>
                                        <!--end::Bullet-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid mx-5">
                                            <input class="form-check-input" type="checkbox" value=""/>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Description-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Scoping
                                                &amp; Estimations</a>
                                            <span class="text-muted fw-bold d-block">Due in 5 Days</span>
                                        </div>
                                        <!--end::Description-->
                                        <span class="badge badge-light-warning fs-8 fw-bolder">New</span>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Bullet-->
                                        <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                        <!--end::Bullet-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid mx-5">
                                            <input class="form-check-input" type="checkbox" value=""/>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Description-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">KPI App
                                                Showcase</a>
                                            <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                                        </div>
                                        <!--end::Description-->
                                        <span class="badge badge-light-primary fs-8 fw-bolder">New</span>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Bullet-->
                                        <span class="bullet bullet-vertical h-40px bg-danger"></span>
                                        <!--end::Bullet-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid mx-5">
                                            <input class="form-check-input" type="checkbox" value=""/>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Description-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Project
                                                Meeting</a>
                                            <span class="text-muted fw-bold d-block">Due in 12 Days</span>
                                        </div>
                                        <!--end::Description-->
                                        <span class="badge badge-light-danger fs-8 fw-bolder">New</span>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Bullet-->
                                        <span class="bullet bullet-vertical h-40px bg-success"></span>
                                        <!--end::Bullet-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid mx-5">
                                            <input class="form-check-input" type="checkbox" value=""/>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Description-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Customers
                                                Update</a>
                                            <span class="text-muted fw-bold d-block">Due in 1 week</span>
                                        </div>
                                        <!--end::Description-->
                                        <span class="badge badge-light-success fs-8 fw-bolder">New</span>
                                    </div>
                                    <!--end:Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end:List Widget 3-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-8">
                            <!--begin::Tables Widget 9-->
                            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                                    </h3>
                                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                         data-bs-trigger="hover" title="Click to add a user">
                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                           data-bs-target="#kt_modal_invite_friends">
                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                                            <span class="svg-icon svg-icon-3">
                                            <svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                            </svg>
                                        </span>
                                            <!--end::Svg Icon-->New Member</a>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="w-25px">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                               data-kt-check="true"
                                                               data-kt-check-target=".widget-9-check"/>
                                                    </div>
                                                </th>
                                                <th class="min-w-150px">Authors</th>
                                                <th class="min-w-140px">Company</th>
                                                <th class="min-w-120px">Progress</th>
                                                <th class="min-w-100px text-end">Actions</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                               value="1"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            <img src="{{ asset('web/media/avatars/150-11.jpg') }}"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary fs-6">Ana
                                                                Simmons</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       class="text-dark fw-bolder text-hover-primary d-block fs-6">Intertico</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex flex-column w-100 me-2">
                                                        <div class="d-flex flex-stack mb-2">
                                                            <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                                                        </div>
                                                        <div class="progress h-6px w-100">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 {{ $styleCss }}="width: 50%" aria-valuenow="50"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="#"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                  fill="#000000"/>
                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="#"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
                                                                    </svg>
                                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="#"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                  fill="#000000" fill-rule="nonzero"/>
                                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                               value="1"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            <img src="{{ asset('web/media/avatars/150-3.jpg') }}"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary fs-6">Jessie
                                                                Clarcson</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">C#, ASP.NET, MS SQL</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       class="text-dark fw-bolder text-hover-primary d-block fs-6">Agoda</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Houses &amp; Hotels</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex flex-column w-100 me-2">
                                                        <div class="d-flex flex-stack mb-2">
                                                            <span class="text-muted me-2 fs-7 fw-bold">70%</span>
                                                        </div>
                                                        <div class="progress h-6px w-100">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                 {{ $styleCss }}="width: 70%" aria-valuenow="70"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="#"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                  fill="#000000"/>
                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <a href="#"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
                                                                    </svg>
                                                                </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <a href="#"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                  fill="#000000" fill-rule="nonzero"/>
                                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                               value="1"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            <img src="{{ asset('web/media/avatars/150-4.jpg') }}"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary fs-6">Lebron
                                                                Wayde</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">PHP, Laravel, VueJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Transportation</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex flex-column w-100 me-2">
                                                        <div class="d-flex flex-stack mb-2">
                                                            <span class="text-muted me-2 fs-7 fw-bold">60%</span>
                                                        </div>
                                                        <div class="progress h-6px w-100">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                 {{ $styleCss }}="width: 60%" aria-valuenow="60"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                            </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="#"
                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                        <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                  fill="#000000"/>
                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="#"
                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                        <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
                                                                    </svg>
                                                                </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="#"
                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                  fill="#000000" fill-rule="nonzero"/>
                                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                               value="1"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            <img src="{{ asset('web/media/avatars/150-5.jpg') }}"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary fs-6">Natali
                                                                Goodwin</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">Python, PostgreSQL, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       class="text-dark fw-bolder text-hover-primary d-block fs-6">The
                                                        Hill</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Insurance</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex flex-column w-100 me-2">
                                                        <div class="d-flex flex-stack mb-2">
                                                            <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                                                        </div>
                                                        <div class="progress h-6px w-100">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                 {{ $styleCss }}="width: 50%" aria-valuenow="50"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                        </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                <a href="#"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                    <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                  fill="#000000"/>
                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="#"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
                                                                    </svg>
                                                                </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="#"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                    <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                  fill="#000000" fill-rule="nonzero"/>
                                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                               value="1"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            <img src="{{ asset('web/media/avatars/150-6.jpg') }}"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary fs-6">Kevin
                                                                Leonard</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Art Director</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex flex-column w-100 me-2">
                                                        <div class="d-flex flex-stack mb-2">
                                                            <span class="text-muted me-2 fs-7 fw-bold">90%</span>
                                                        </div>
                                                        <div class="progress h-6px w-100">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                 {{ $styleCss }}="width: 90%" aria-valuenow="90"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                    </div>
    </td>
    <td>
        <div class="d-flex justify-content-end flex-shrink-0">
            <a href="#"
               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                  fill="#000000"/>
                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                <!--end::Svg Icon-->
            </a>
            <a href="#"
               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
                                                                    </svg>
                                                                </span>
                <!--end::Svg Icon-->
            </a>
            <a href="#"
               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="https://www.w3.org/2000/svg"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                  fill="#000000" fill-rule="nonzero"/>
                                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 9-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::List Widget 2-->
                            <div class="card card-xl-stretch mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title fw-bolder text-dark">Authors</h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px"
                                             data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick
                                                    Actions
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator mb-3 opacity-75"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">New Ticket</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">New Customer</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                 data-kt-menu-placement="right-start"
                                                 data-kt-menu-flip="left-start, top">
                                                <!--begin::Menu item-->
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Admin Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Staff Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Member Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">New Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator mt-3 opacity-75"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content px-3 py-3">
                                                    <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ asset('web/media/avatars/150-1.jpg') }}" class="" alt=""/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Text-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Emma
                                                Smith</a>
                                            <span class="text-muted d-block fw-bold">Project Manager</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ asset('web/media/avatars/150-4.jpg') }}" class="" alt=""/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Text-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Sean
                                                Bean</a>
                                            <span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ asset('web/media/avatars/150-12.jpg') }}" class="" alt=""/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Text-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Brian
                                                Cox</a>
                                            <span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ asset('web/media/avatars/150-8.jpg') }}" class="" alt=""/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Text-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Francis
                                                Mitcham</a>
                                            <span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ asset('web/media/avatars/150-6.jpg') }}" class="" alt=""/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Text-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Dan
                                                Wilson</a>
                                            <span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 2-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::List Widget 6-->
                            <div class="card card-xl-stretch mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title fw-bolder text-dark">Notifications</h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                             data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Payments
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="Specify a target name for future usage and reference"></i></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                 data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                       type="checkbox" value="1" checked="checked"
                                                                       name="notifications"/>
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-0">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-warning me-5">
                                            <!--begin::Svg Icon | path: icons/duotone/Dashboard/Library.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                              fill="#000000"/>
                                                        <rect fill="#000000" opacity="0.3"
                                                              transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                              x="16.3255682" y="2.94551858" width="3" height="18"
                                                              rx="1"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Group
                                                lunch celebration</a>
                                            <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="fw-bolder text-warning py-1">+28%</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-success me-5">
                                            <!--begin::Svg Icon | path: icons/duotone/Dashboard/Library.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                              fill="#000000"/>
                                                        <rect fill="#000000" opacity="0.3"
                                                              transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                              x="16.3255682" y="2.94551858" width="3" height="18"
                                                              rx="1"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Navigation
                                                optimization</a>
                                            <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="fw-bolder text-success py-1">+50%</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-danger me-5">
                                            <!--begin::Svg Icon | path: icons/duotone/Dashboard/Library.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="https://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                              fill="#000000"/>
                                                        <rect fill="#000000" opacity="0.3"
                                                              transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                              x="16.3255682" y="2.94551858" width="3" height="18"
                                                              rx="1"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Rebrand
                                                strategy planning</a>
                                            <span class="text-muted fw-bold d-block">Due in 5 Days</span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="fw-bolder text-danger py-1">-27%</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-info rounded p-5">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-info me-5">
                                            <!--begin::Svg Icon | path: icons/duotone/Dashboard/Library.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                              fill="#000000"/>
                                                        <rect fill="#000000" opacity="0.3"
                                                              transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                              x="16.3255682" y="2.94551858" width="3" height="18"
                                                              rx="1"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Product
                                                goals strategy</a>
                                            <span class="text-muted fw-bold d-block">Due in 7 Days</span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Lable-->
                                        <span class="fw-bolder text-info py-1">+8%</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 6-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::List Widget 4-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">Trends</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">Latest tech trends</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                             data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Payments
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="Specify a target name for future usage and reference"></i></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                 data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                       type="checkbox" value="1" checked="checked"
                                                                       name="notifications"/>
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset('web/media/svg/brand-logos/plurk.svg') }}"
                                                     class="h-50 align-self-center" alt=""/>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top
                                                    Authors</a>
                                                <span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+82$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset('web/media/svg/brand-logos/telegram.svg')  }}"
                                                     class="h-50 align-self-center" alt=""/>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular
                                                    Authors</a>
                                                <span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+280$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset('web/media/svg/brand-logos/vimeo.svg') }}"
                                                     class="h-50 align-self-center" alt=""/>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">New
                                                    Users</a>
                                                <span class="text-muted fw-bold d-block fs-7">John, Pat, Jimmy</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset('web/media/svg/brand-logos/bebo.svg') }}"
                                                     class="h-50 align-self-center" alt=""/>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Active
                                                    Customers</a>
                                                <span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset('web/media/svg/brand-logos/kickstarter.svg') }}"
                                                     class="h-50 align-self-center" alt=""/>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Bestseller
                                                    Theme</a>
                                                <span class="text-muted fw-bold d-block fs-7">Disco, Retro, Sports</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 4-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-5 gx-xxl-8">
                        <!--begin::Col-->
                        <div class="col-xxl-4">
                            <!--begin::Mixed Widget 5-->
                            <div class="card card-xxl-stretch mb-xl-3">
                                <!--begin::Beader-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Trends</span>
                                        <span class="text-muted fw-bold fs-7">Latest trends</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                              opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                             data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Payments
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip"
                                                       title="Specify a target name for future usage and reference"></i></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                 data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                       type="checkbox" value="1" checked="checked"
                                                                       name="notifications"/>
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Chart-->
                                    <div class="mixed-widget-5-chart card-rounded-top" data-kt-chart-color="success"
                                         {{ $styleCss }}="height: 150px"></div>
                                    <!--end::Chart-->
                                    <!--begin::Items-->
                                    <div class="mt-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-5">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center me-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light">
                                                        <img src="{{ asset('web/media/svg/brand-logos/plurk.svg') }}"
                                                             class="h-50" alt=""/>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top
                                                        Authors</a>
                                                    <div class="fs-7 text-muted fw-bold mt-1">Ricky Hunt, Sandra Trepp
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <div class="badge badge-light fw-bold py-4 px-3">+82$</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-5">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center me-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light">
                                                        <img src="{{ asset('web/media/svg/brand-logos/figma-1.svg') }}"
                                                             class="h-50" alt=""/>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top
                                                        Sales</a>
                                                    <div class="fs-7 text-muted fw-bold mt-1">PitStop Emails</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <div class="badge badge-light fw-bold py-4 px-3">+82$</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center me-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light">
                                                        <img src="{{ asset('web/media/svg/brand-logos/vimeo.svg') }}"
                                                             class="h-50" alt=""/>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="py-1">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top
                                                        Engagement</a>
                                                    <div class="fs-7 text-muted fw-bold mt-1">KT.com</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <div class="badge badge-light fw-bold py-4 px-3">+82$</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 5-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-8">
                            <!--begin::Tables Widget 5-->
                            <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Latest Products</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">More than 400 new products</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark active fw-bolder px-4 me-1"
                                                   data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Month</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1"
                                                   data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Week</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4"
                                                   data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">Day</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="tab-content">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 w-50px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-140px"></th>
                                                        <th class="p-0 min-w-110px"></th>
                                                        <th class="p-0 min-w-50px"></th>
                                                    </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/plurk.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad
                                                                Simmons</a>
                                                            <span class="text-muted fw-bold d-block">Movie Creator</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">React, HTML</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-success">Approved</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/telegram.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
                                                                Authors</a>
                                                            <span class="text-muted fw-bold d-block">Most Successful</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">Python, MySQL</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning">In Progress</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/vimeo.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New
                                                                Users</a>
                                                            <span class="text-muted fw-bold d-block">Awesome Users</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">Laravel,Metronic</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-primary">Success</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/bebo.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
                                                                Customers</a>
                                                            <span class="text-muted fw-bold d-block">Movie Creator</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">AngularJS, C#</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-danger">Rejected</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/kickstarter.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Bestseller
                                                                Theme</a>
                                                            <span class="text-muted fw-bold d-block">Best Customers</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning">In Progress</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 w-50px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-140px"></th>
                                                        <th class="p-0 min-w-110px"></th>
                                                        <th class="p-0 min-w-50px"></th>
                                                    </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/plurk.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad
                                                                Simmons</a>
                                                            <span class="text-muted fw-bold d-block">Movie Creator</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">React, HTML</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-success">Approved</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/telegram.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
                                                                Authors</a>
                                                            <span class="text-muted fw-bold d-block">Most Successful</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">Python, MySQL</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning">In Progress</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/bebo.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
                                                                Customers</a>
                                                            <span class="text-muted fw-bold d-block">Movie Creator</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">AngularJS, C#</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-danger">Rejected</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 w-50px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-140px"></th>
                                                        <th class="p-0 min-w-110px"></th>
                                                        <th class="p-0 min-w-50px"></th>
                                                    </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/kickstarter.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Bestseller
                                                                Theme</a>
                                                            <span class="text-muted fw-bold d-block">Best Customers</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning">In Progress</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/bebo.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
                                                                Customers</a>
                                                            <span class="text-muted fw-bold d-block">Movie Creator</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">AngularJS, C#</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-danger">Rejected</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/vimeo.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New
                                                                Users</a>
                                                            <span class="text-muted fw-bold d-block">Awesome Users</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">Laravel,Metronic</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-primary">Success</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset('web/media/svg/brand-logos/telegram.svg') }}"
                                                                             class="h-50 align-self-center" alt=""/>
                                                                    </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                               class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
                                                                Authors</a>
                                                            <span class="text-muted fw-bold d-block">Most Successful</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">Python, MySQL</td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning">In Progress</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <rect fill="#000000" opacity="0.5"
                                                                                      transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                      x="11" y="5" width="2" height="14"
                                                                                      rx="1"/>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Tables Widget 5-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    
        <!--end::Content-->
       
    
    <!--end::Wrapper-->
    <!--end::Root-->
    <!--begin::Drawers-->

    <!--begin::Modals-->
    <!--begin::Modal - Invite Friends-->
    <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                       fill="#000000">
										<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
										<rect fill="#000000" opacity="0.5"
                                              transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                              x="0" y="7" width="16" height="2" rx="1"/>
									</g>
								</svg>
							</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Invite a Friend</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">If you need more info, please check out
                            <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Google Contacts Invite-->
                    <div class="btn btn-light-primary fw-bolder w-100 mb-8">
                        <img alt="Logo" src="{{ asset('web/media/svg/brand-logos/google-icon.svg') }}"
                             class="h-20px me-3"/>Invite Gmail Contacts
                    </div>
                    <!--end::Google Contacts Invite-->
                    <!--begin::Separator-->
                    <div class="separator d-flex flex-center mb-8">
                        <span class="text-uppercase bg-white fs-7 fw-bold text-gray-400 px-3">or</span>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Textarea-->
                    <textarea class="form-control form-control-solid mb-8" rows="3"
                              placeholder="Type or paste emails here"></textarea>
                    <!--end::Textarea-->
                    <!--begin::Users-->
                    <div class="mb-10">
                        <!--begin::Heading-->
                        <div class="fs-6 fw-bold mb-2">Your Invitations</div>
                        <!--end::Heading-->
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-1.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                            Smith</a>
                                        <div class="fw-bold text-gray-400">e.smith@kpmg.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                            Macy</a>
                                        <div class="fw-bold text-gray-400">melody@altbox.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-2.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max
                                            Smith</a>
                                        <div class="fw-bold text-gray-400">max@kt.com</div>
                                    </div>

                                    <!--end::Details-->
                                </div>

                                <!--end::Details-->

                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-4.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                            Bean</a>
                                        <div class="fw-bold text-gray-400">sean@dellito.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-15.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                            Cox</a>
                                        <div class="fw-bold text-gray-400">brian@exchange.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-bold text-gray-400">mikaela@pexcom.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-8.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                            Mitcham</a>
                                        <div class="fw-bold text-gray-400">f.mitcham@kpmg.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                            Wild</a>
                                        <div class="fw-bold text-gray-400">olivia@corpmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                            Owen</a>
                                        <div class="fw-bold text-gray-400">owen.neil@gmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-6.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                            Wilson</a>
                                        <div class="fw-bold text-gray-400">dam@consilting.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                            Bold</a>
                                        <div class="fw-bold text-gray-400">emma@intenso.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-7.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                            Crown</a>
                                        <div class="fw-bold text-gray-400">ana.cf@limtel.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                            Doe</a>
                                        <div class="fw-bold text-gray-400">robert@benko.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-17.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                            Miller</a>
                                        <div class="fw-bold text-gray-400">miller@mapple.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                            Kunic</a>
                                        <div class="fw-bold text-gray-400">lucy.m@fentech.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('web/media/avatars/150-10.jpg') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                            Wilder</a>
                                        <div class="fw-bold text-gray-400">ethan@loop.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-bold text-gray-400">mikaela@pexcom.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2"
                                            data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Users-->
                    <!--begin::Notice-->
                    <div class="d-flex flex-stack">
                        <!--begin::Label-->
                        <div class="me-5 fw-bold">
                            <label class="fs-6">Adding Users by Team Members</label>
                            <div class="fs-7 text-gray-400">If you need more info, please check budget planning</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                            <span class="form-check-label fw-bold text-gray-400">Allowed</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Invite Friend-->
   
    <!--begin::Modal - Create App-->
    <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Create App</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                       fill="#000000">
										<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
										<rect fill="#000000" opacity="0.5"
                                              transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                              x="0" y="7" width="16" height="2" rx="1"/>
									</g>
								</svg>
							</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                         id="kt_modal_create_app_stepper">
                        <!--begin::Aside-->
                        <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                            <!--begin::Nav-->
                            <div class="stepper-nav ps-lg-10">
                                <!--begin::Step 1-->
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Details</h3>
                                        <div class="stepper-desc">Name your App</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--begin::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Frameworks</h3>
                                        <div class="stepper-desc">Define your app framework</div>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Database</h3>
                                        <div class="stepper-desc">Select the app database type</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Billing</h3>
                                        <div class="stepper-desc">Provide payment details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Release</h3>
                                        <div class="stepper-desc">Review and Submit</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 5-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--begin::Aside-->
                        <!--begin::Content-->
                        <div class="flex-row-fluid py-lg-5 px-lg-15">
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">App Name</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   name="name" placeholder="" value=""/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Category</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="Select your app category"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Options-->
                                            <div class="fv-row">
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
															<!--begin:Icon-->
															<span class="symbol symbol-50px me-6">
																<span class="symbol-label bg-light-primary">
																	<!--begin::Svg Icon | path: icons/duotone/Dashboard/Globe.svg-->
																	<span class="svg-icon svg-icon-1 svg-icon-primary">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                                                      fill="#000000"
                                                                                      fill-rule="nonzero"/>
																				<circle fill="#000000" opacity="0.3"
                                                                                        cx="12" cy="10" r="6"/>
																			</g>
																		</svg>
																	</span>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
															<span class="d-flex flex-column">
																<span class="fw-bolder fs-6">Quick Online Courses</span>
																<span class="fs-7 text-muted">Creating a clear text structure is just one SEO</span>
															</span>
                                                        <!--end:Info-->
														</span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
															<input class="form-check-input" type="radio" name="category"
                                                                   value="1"/>
														</span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
															<!--begin:Icon-->
															<span class="symbol symbol-50px me-6">
																<span class="symbol-label bg-light-danger">
																	<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
																	<span class="svg-icon svg-icon-1 svg-icon-danger">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="5" y="5" width="5" height="5"
                                                                                      rx="1" fill="#000000"/>
																				<rect x="14" y="5" width="5" height="5"
                                                                                      rx="1" fill="#000000"
                                                                                      opacity="0.3"/>
																				<rect x="5" y="14" width="5" height="5"
                                                                                      rx="1" fill="#000000"
                                                                                      opacity="0.3"/>
																				<rect x="14" y="14" width="5" height="5"
                                                                                      rx="1" fill="#000000"
                                                                                      opacity="0.3"/>
																			</g>
																		</svg>
																	</span>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
															<span class="d-flex flex-column">
																<span class="fw-bolder fs-6">Face to Face Discussions</span>
																<span class="fs-7 text-muted">Creating a clear text structure is just one aspect</span>
															</span>
                                                        <!--end:Info-->
														</span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
															<input class="form-check-input" type="radio" name="category"
                                                                   value="2"/>
														</span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
															<!--begin:Icon-->
															<span class="symbol symbol-50px me-6">
																<span class="symbol-label bg-light-success">
																	<!--begin::Svg Icon | path: icons/duotone/Devices/Watch1.svg-->
																	<span class="svg-icon svg-icon-1 svg-icon-success">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<path d="M9,8 C8.44771525,8 8,8.44771525 8,9 L8,15 C8,15.5522847 8.44771525,16 9,16 L15,16 C15.5522847,16 16,15.5522847 16,15 L16,9 C16,8.44771525 15.5522847,8 15,8 L9,8 Z M9,6 L15,6 C16.6568542,6 18,7.34314575 18,9 L18,15 C18,16.6568542 16.6568542,18 15,18 L9,18 C7.34314575,18 6,16.6568542 6,15 L6,9 C6,7.34314575 7.34314575,6 9,6 Z"
                                                                                  fill="#000000" fill-rule="nonzero"/>
																			<path d="M9,8 C8.44771525,8 8,8.44771525 8,9 L8,15 C8,15.5522847 8.44771525,16 9,16 L15,16 C15.5522847,16 16,15.5522847 16,15 L16,9 C16,8.44771525 15.5522847,8 15,8 L9,8 Z"
                                                                                  fill="#000000" opacity="0.3"/>
																			<path d="M9,18 L15,18 L15,20.5 C15,21.3284271 14.3284271,22 13.5,22 L10.5,22 C9.67157288,22 9,21.3284271 9,20.5 L9,18 Z"
                                                                                  fill="#000000" opacity="0.3"/>
																			<path d="M10.5,2 L13.5,2 C14.3284271,2 15,2.67157288 15,3.5 L15,6 L9,6 L9,3.5 C9,2.67157288 9.67157288,2 10.5,2 Z"
                                                                                  fill="#000000" opacity="0.3"/>
																		</svg>
																	</span>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
															<span class="d-flex flex-column">
																<span class="fw-bolder fs-6">Full Intro Training</span>
																<span class="fs-7 text-muted">Creating a clear text structure copywriting</span>
															</span>
                                                        <!--end:Info-->
														</span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
															<input class="form-check-input" type="radio" name="category"
                                                                   value="3"/>
														</span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end:Options-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Select Framework</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="Specify your apps framework"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin:Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-warning">
																<i class="fab fa-html5 text-warning fs-2x"></i>
															</span>
														</span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">HTML5</span>
															<span class="fs-7 text-muted">Base Web Projec</span>
														</span>
                                                    <!--end:Info-->
													</span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" checked="checked"
                                                               name="framework" value="1"/>
													</span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin:Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-success">
																<i class="fab fa-react text-success fs-2x"></i>
															</span>
														</span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">ReactJS</span>
															<span class="fs-7 text-muted">Robust and flexible app framework</span>
														</span>
                                                    <!--end:Info-->
													</span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="framework"
                                                               value="2"/>
													</span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin:Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-danger">
																<i class="fab fa-angular text-danger fs-2x"></i>
															</span>
														</span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">Angular</span>
															<span class="fs-7 text-muted">Powerful data mangement</span>
														</span>
                                                    <!--end:Info-->
													</span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="framework"
                                                               value="3"/>
													</span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin:Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-primary">
																<i class="fab fa-vuejs text-primary fs-2x"></i>
															</span>
														</span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">Vue</span>
															<span class="fs-7 text-muted">Lightweight and responsive framework</span>
														</span>
                                                    <!--end:Info-->
													</span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="framework"
                                                               value="4"/>
													</span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Database Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   name="dbname" placeholder="" value="master_db"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Select Database Engine</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="Select your app database engine"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin::Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-success">
																<i class="fas fa-database text-success fs-2x"></i>
															</span>
														</span>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">MySQL</span>
															<span class="fs-7 text-muted">Basic MySQL database</span>
														</span>
                                                    <!--end::Info-->
													</span>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="dbengine"
                                                               checked="checked" value="1"/>
													</span>
                                                <!--end::Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin::Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-danger">
																<i class="fab fa-google text-danger fs-2x"></i>
															</span>
														</span>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">Firebase</span>
															<span class="fs-7 text-muted">Google based app data management</span>
														</span>
                                                    <!--end::Info-->
													</span>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="dbengine"
                                                               value="2"/>
													</span>
                                                <!--end::Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer">
                                                <!--begin::Label-->
                                                <span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-warning">
																<i class="fab fa-amazon text-warning fs-2x"></i>
															</span>
														</span>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">DynamoDB</span>
															<span class="fs-7 text-muted">Amazon Fast NoSQL Database</span>
														</span>
                                                    <!--end::Info-->
													</span>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="dbengine"
                                                               value="3"/>
													</span>
                                                <!--end::Input-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">Name On Card</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="Specify a card holder's name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                   name="card_name" value="Max Doe"/>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                       placeholder="Enter card number" name="card_number"
                                                       value="4111 1111 1111 1111"/>
                                                <!--end::Input-->
                                                <!--begin::Card logos-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                    <img src="{{ asset('web/media/svg/card-logos/visa.svg') }}" alt=""
                                                         class="h-25px"/>
                                                    <img src="{{ asset('web/media/svg/card-logos/mastercard.svg') }}"
                                                         alt="" class="h-25px"/>
                                                    <img src="{{ asset('web/media/svg/card-logos/american-express.svg') }}"
                                                         alt="" class="h-25px"/>
                                                </div>
                                                <!--end::Card logos-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2">Expiration
                                                    Date</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_month"
                                                                class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Month">
                                                            <option></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_year"
                                                                class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Year">
                                                            <option></option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">CVV</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                       data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                           minlength="3" maxlength="4" placeholder="CVV"
                                                           name="card_cvv"/>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                                        <span class="svg-icon svg-icon-2hx">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<rect fill="#000000" opacity="0.3" x="2" y="5"
                                                                              width="20" height="14" rx="2"/>
																		<rect fill="#000000" x="2" y="8" width="20"
                                                                              height="3"/>
																		<rect fill="#000000" opacity="0.3" x="16" y="14"
                                                                              width="4" height="2" rx="1"/>
																	</g>
																</svg>
															</span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">
                                                <label class="fs-6 fw-bold form-label">Save Card for further
                                                    billing?</label>
                                                <div class="fs-7 fw-bold text-gray-400">If you need more info, please
                                                    check budget planning
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       checked="checked"/>
                                                <span class="form-check-label fw-bold text-gray-400">Save Card</span>
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100 text-center">
                                        <!--begin::Heading-->
                                        <h1 class="fw-bolder text-dark mb-3">Release!</h1>
                                        <!--end::Heading-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-3">Submit your app to kickstart your
                                            project.
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Illustration-->
                                        <div class="text-center px-4 py-15">
                                            <img src="{{ asset('web/media/illustrations/todo.png') }}" alt=""
                                                 class="mw-100 mh-150px"/>
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                </div>
                                <!--end::Step 5-->
                                <!--begin::Actions-->
                                <div class="d-flex flex-stack pt-10">
                                    <!--begin::Wrapper-->
                                    <div class="me-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                                data-kt-stepper-action="previous">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                                            <span class="svg-icon svg-icon-3 me-1">
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<rect fill="#000000" opacity="0.3"
                                                              transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)"
                                                              x="14" y="7" width="2" height="10" rx="1"/>
														<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                              fill="#000000" fill-rule="nonzero"
                                                              transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)"/>
													</g>
												</svg>
											</span>
                                            <!--end::Svg Icon-->Back
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Wrapper-->
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary"
                                                data-kt-stepper-action="submit">
												<span class="indicator-label">Submit
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
												<span class="svg-icon svg-icon-3 ms-2 me-0">
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"/>
															<rect fill="#000000" opacity="0.5"
                                                                  transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                                  x="7.5" y="7.5" width="2" height="9" rx="1"/>
															<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                  fill="#000000" fill-rule="nonzero"
                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
														</g>
													</svg>
												</span>
                                                    <!--end::Svg Icon--></span>
                                            <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary"
                                                data-kt-stepper-action="next">Continue
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                            <span class="svg-icon svg-icon-3 ms-1 me-0">
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<rect fill="#000000" opacity="0.5"
                                                              transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                              x="7.5" y="7.5" width="2" height="9" rx="1"/>
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                              fill="#000000" fill-rule="nonzero"
                                                              transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
													</g>
												</svg>
											</span>
                                            <!--end::Svg Icon--></button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Create App-->
   
    <!--begin::Modal - Upgrade plan-->
    <div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header justify-content-end border-0 pb-0">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                       fill="#000000">
										<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
										<rect fill="#000000" opacity="0.5"
                                              transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                              x="0" y="7" width="16" height="2" rx="1"/>
									</g>
								</svg>
							</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Upgrade a Plan</h1>
                        <div class="text-gray-400 fw-bold fs-5">If you need more info, please check
                            <a href="#" class="link-primary fw-bolder">Pricing Guidelines</a>.
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Plans-->
                    <div class="d-flex flex-column">
                        <!--begin::Nav group-->
                        <div class="nav-group nav-group-outline mx-auto" data-kt-buttons="true">
                            <a href="#"
                               class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active"
                               data-kt-plan="month">Monthly</a>
                            <a href="#" class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3"
                               data-kt-plan="annual">Annual</a>
                        </div>
                        <!--end::Nav group-->
                        <!--begin::Row-->
                        <div class="row mt-10">
                            <!--begin::Col-->
                            <div class="col-lg-6 mb-10 mb-lg-0">
                                <!--begin::Tabs-->
                                <div class="nav flex-column">
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6"
                                         data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                       checked="checked" value="startup"/>
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">
                                                    Startup</h2>
                                                <div class="fw-bold opacity-50">Best for startups</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bolder" data-kt-plan-price-month="39"
                                                  data-kt-plan-price-annual="399">39</span>
                                            <span class="fs-7 opacity-50">/
												<span data-kt-element="period">Mon</span></span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6"
                                         data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                       value="advanced"/>
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">
                                                    Advanced</h2>
                                                <div class="fw-bold opacity-50">Best for 100+ team size</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bolder" data-kt-plan-price-month="339"
                                                  data-kt-plan-price-annual="3399">339</span>
                                            <span class="fs-7 opacity-50">/
												<span data-kt-element="period">Mon</span></span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6"
                                         data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                       value="enterprise"/>
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">
                                                    Enterprise
                                                    <span class="badge badge-light-success ms-2 fs-7">Most popular</span>
                                                </h2>
                                                <div class="fw-bold opacity-50">Best value for 1000+ team</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bolder" data-kt-plan-price-month="999"
                                                  data-kt-plan-price-annual="9999">999</span>
                                            <span class="fs-7 opacity-50">/
												<span data-kt-element="period">Mon</span></span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark d-flex flex-stack text-start p-6">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                       value="custom"/>
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">
                                                    Custom</h2>
                                                <div class="fw-bold opacity-50">Requet a custom license</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <a href="#" class="btn btn-sm btn-primary">Contact Us</a>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                </div>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6">
                                <!--begin::Tab content-->
                                <div class="tab-content rounded h-100 bg-light p-10">
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade show active" id="kt_upgrade_plan_startup">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bolder text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-gray-400 fw-bold">Optimal for 10+ team size and new
                                                startup
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-400 flex-grow-1">Finance Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
                                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-400 flex-grow-1">Accounting Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
                                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-400 flex-grow-1">Network Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
                                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold fs-5 text-gray-400 flex-grow-1">Unlimited Cloud Space</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
                                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade" id="kt_upgrade_plan_advanced">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bolder text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-gray-400 fw-bold">Optimal for 100+ team size and grown
                                                company
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-400 flex-grow-1">Network Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
                                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold fs-5 text-gray-400 flex-grow-1">Unlimited Cloud Space</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
                                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade" id="kt_upgrade_plan_enterprise">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bolder text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-gray-400 fw-bold">Optimal for 1000+ team and enterpise
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
															<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
														</svg>
													</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Plans-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-center flex-row-fluid pt-12">
                        <button type="reset" class="btn btn-white me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upgrade Plan</button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    
    <!--end::Modal - Upgrade plan-->
    <!--end::Modals-->

@endsection
