<div class="row gx-10 mb-5">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('first_name', __('messages.client.first_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('first_name', isset($user) ? $user->first_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => 'First Name', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('last_name', __('messages.client.last_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('last_name', isset($user) ? $user->last_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Last Name', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('email', __('messages.client.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::email('email', isset($user) ? $user->email : null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Email', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('contact', __('messages.client.contact_no').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::tel('contact', isset($user)?$user->contact:null, ['class' => 'form-control form-control-lg form-control-solid', 'placeholder' => 'Phone number', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
            {{ Form::hidden('region_code',isset($user) ? $user->region_code : null,['id'=>'prefix_code']) }}
            <br>
            <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
            <span id="error-msg" class="hide"></span>
        </div>
    </div>
    @if(!isset($user))
        <div class="col-md-6 mb-5">
            <div class="fv-row" data-kt-password-meter="true">
                <div class="mb-1">
                    {{ Form::label('password',__('messages.client.password').':' ,['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <span class="text-danger">{{isset($user) ? null : '*' }}</span>
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid"
                               type="password" placeholder="Password" name="password" autocomplete="off">
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                              data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5">
            <div class="fv-row" data-kt-password-meter="true">
                <div class="mb-1">
                    {{ Form::label('confirmPassword',__('messages.client.confirm_password').':' ,['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <span class="text-danger">{{isset($user) ? null : '*' }}</span>
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid"
                               type="password" placeholder="Confirm Password" name="password_confirmation"
                               autocomplete="off">
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                              data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
            </div>
        </div>
    @endif
    {{--    <div class="col-lg-6">--}}
    {{--        <div class="mb-5">--}}
    {{--            {{ Form::label('role', __('messages.client.role').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--            {{ Form::select('role', $roles, isset($user) ? $user->roles->first()->id : null, ['class' => 'form-select form-select-solid form-select-lg fw-bold','required','data-control'=>'select2','placeholder' => 'Select role']) }}--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="col-lg-3 mb-7">
        <div class="justify-content-center">
            <label class="form-label fs-6 fw-bolder text-gray-700 mr-3">{{ __('messages.client.profile') }}</label>
        </div>
        <div class="image-input image-input-outline" data-kt-image-input="true">
            <div class="image-input-wrapper w-125px h-125px"
            {{ $styleCss }}="
                background-image: url('{{ !empty($user->profile_image) ? $user->profile_image : 
                asset('assets/images/avatar.png') }}')">
        </div>
        <label
                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                data-bs-original-title="Change avatar">
            <i class="bi bi-pencil-fill fs-7">
                <input type="file" name="profile" accept=".png, .jpg, .jpeg">
            </i>
            <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
            <input type="hidden" name="avatar_remove">
        </label>
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
              data-bs-original-title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
            </span>
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
              data-bs-original-title="Remove avatar"
        {{$styleCss}}="display: {{ !empty($user->profile_image) ? 'block' : 'none' }}">
        <i class="bi bi-x fs-2"></i>
        </span>
    </div>
    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
</div>
<div class="d-flex">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('users.index') }}" type="reset"
       class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
</div>
</div>

