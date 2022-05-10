@php $styleCss = 'style'; @endphp
<div class="modal show fade" id="changePasswordModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">{{ __('messages.user.change_password') }}</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="https://www.w3.org/2000/svg"
                             width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000,                                          4.000000)"
                               fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000,                                        -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
					</span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="changePasswordForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    @csrf
                    @method('PUT')
                    <div class="alert alert-danger d-none" id="editPasswordValidationErrorsBox"></div>
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
                         {{ $styleCss }}="max-height: 317px;">
                        <div class="fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-6 mb-2 required">{{ __('messages.user.current_password').':' }}</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid"
                                           type="password" placeholder="Current Password" name="current_password"
                                           autocomplete="off"/>
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center pass-check-meter mb-3"
                                     data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-6 mb-2 required">{{ __('messages.user.new_password').':' }}</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid"
                                           type="password" placeholder="New Password" name="new_password"
                                           autocomplete="off"/>
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center pass-check-meter mb-3"
                                     data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-6 mb-2 required">{{ __('messages.user.confirm_password').':' }}</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid"
                                           type="password" placeholder="Confirm Password" name="confirm_password"
                                           autocomplete="off"/>
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center pass-check-meter mb-3"
                                     data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-15">
                        {{ Form::button(__('messages.common.save'),['class' => 'btn btn-primary mr-2 me-3','id' => 'passwordChangeBtn','data-kt-users-modal-action' => 'submit']) }}
                        {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-light btn-active-light-primary me-2','data-bs-dismiss' => 'modal']) }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
