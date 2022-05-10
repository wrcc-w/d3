<div class="row gx-10 mb-5">
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('name', __('messages.product.name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('name',isset($product) ? $product->name : null,['class' => 'form-control form-control-solid', 'placeholder' => 'Product Name', 'required','onkeypress'=>"return blockSpecialChar(event)"]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('code', __('messages.product.code').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            <div class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1" data-bs-toggle="tooltip" title=""
                 data-bs-original-title="Click refresh icon to generate product code">
                <i class="far fa-question-circle"></i>
            </div>
            <div class="input-group mb-5">
                {{ Form::text('code', $product->code ?? null,['class' => 'form-control form-control-solid', 'placeholder' => 'Product Code', 'required','id' => 'code', 'maxlength' => 6,'onkeypress'=>"return blockSpecialChar(event)"]) }}
                <a class="input-group-text border-0" id="autoCode" href="javascript:void(0)" data-toggle="tooltip"
                   data-placement="right" title="Generate Code">
                    <i class="fas fa-sync-alt fs-4"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('category', __('messages.product.category').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::select('category_id', $categories,isset($product) ? $product->category_id : null,['class' => 'form-select form-select-solid', 'placeholder' => 'Select Category', 'required', 'id'=>'categoryId', 'data-control' => 'select2']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('unit_price', __('messages.product.unit_price').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::number('unit_price',isset($product) ? $product->unit_price : null,['class' => 'form-control form-control-solid', 'placeholder' => 'Unit Price', 'min'=>'0', 'step'=>".01", 'oninput'=>"validity.valid||(value=value.replace(/\D+/g, '.'))",'required']) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('description', __('messages.product.description').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::textarea('description',isset($product) ? $product->description : null,['class' => 'form-control form-control-solid', 'placeholder' => 'Description']) }}
        </div>
    </div>
    <div class="col-lg-3 mb-7">
        <div class="justify-content-center">
            <label class="form-label fs-6 fw-bolder text-gray-700 mr-3">{{ __('messages.product.image').':' }}</label>
        </div>
        <div class="image-input image-input-outline" data-kt-image-input="true">
            <div class="image-input-wrapper w-125px h-125px bgi-position-center" id="previewImage"
                 {{ $styleCss }}="background-image: url('{{ !empty($product->product_image) ? $product->product_image : asset('assets/images/default-product.jpg') }}')">
            </div>
            <label
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Change Image">
                <i class="bi bi-pencil-fill fs-7">
                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                </i>
                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="image_remove">
            </label>
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
              data-bs-original-title="Cancel Image">
                        <i class="bi bi-x fs-2"></i>
            </span>
        @php
            $image = asset('assets/images/default-product.jpg');
        @endphp
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow remove-image"
              data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
              data-bs-original-title="Remove Image"
        {{$styleCss}}="display:@if($product->product_image == $image) none @else block  @endif">
        <i class="bi bi-x fs-2"></i>
        </span>
    </div>
    <div class="form-text">{{ __('messages.common.allow_file_type') }}: png, jpg, jpeg.</div>
</div>
<div class="d-flex">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('products.index') }}" type="reset"
       class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
</div>
</div>

