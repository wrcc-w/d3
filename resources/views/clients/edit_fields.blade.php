<div class="row gx-10 mb-5">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('first_name', __('messages.client.first_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('first_name', $client->user->first_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => 'First Name', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('last_name', __('messages.client.last_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('last_name', $client->user->last_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Last Name', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('email', __('messages.client.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::email('email', $client->user->email ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Email', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('contact', __('messages.client.contact_no').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::tel('contact', $client->user->contact ?? null, ['class' => 'form-control form-control-lg form-control-solid', 'placeholder' => 'Phone number', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
            {{ Form::hidden('region_code', $client->user->region_code ?? null, ['id'=>'prefix_code']) }}
            <br>
            <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
            <span id="error-msg" class="hide"></span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('website', __('messages.client.website').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('website', $client->website ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Website']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('postal_code', __('messages.client.postal_code').':', ['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
            {{ Form::text('postal_code',$client->postal_code ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Postal Code', 'required', 'maxlength' => 6]) }}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-5">
            {{ Form::label('country',__('messages.client.country').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::select('country_id', $countries, $client->country_id ?? null, ['id'=>'countryId','class' => 'form-select form-select-solid','placeholder' => 'Select Country', 'data-control' => 'select2']) }}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-5">
            {{ Form::label('state', __('messages.client.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::select('state_id', [], null, ['id'=>'stateId','class' => 'form-select form-select-solid','placeholder' => 'Select State', 'data-control' => 'select2']) }}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-5">
            {{ Form::label('city', __('messages.client.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::select('city_id', [], null, ['id'=>'cityId','class' => 'form-select form-select-solid','placeholder' => 'Select City', 'data-control' => 'select2']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('address', __('messages.client.address').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::textarea('address', $client->address ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Address']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('notes', __('messages.client.notes').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::textarea('note', $client->note ?? null,['class' => 'form-control form-control-solid', 'placeholder' => 'Notes']) }}
        </div>
    </div>
    <div class="col-lg-3 mb-7">
        <div class="justify-content-center">
            <label class="form-label fs-6 fw-bolder text-gray-700 mr-3">{{ __('messages.client.profile').':' }}</label>
        </div>
        <div class="image-input image-input-outline" data-kt-image-input="true">
            <div class="image-input-wrapper w-125px h-125px" id="previewImage"
                {{ $styleCss  }}="background-image: url('{{ !empty($client->user->profile_image) ? $client->user->profile_image : asset('web/media/avatars/150-26.jpg') }}')">
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
        @php
            $image =  asset('assets/images/avatar.png');
        @endphp
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow remove-image"
              data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
              data-bs-original-title="Remove avatar"
        {{$styleCss}}="display:@if($client->user->profile_image == $image) none @else block  @endif">
        <i class="bi bi-x fs-2"></i>
        </span>
    </div>
    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
</div>
<div class="d-flex mt-5">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('clients.index') }}" type="reset"
       class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
</div>
</div>

