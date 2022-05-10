<div class="row">
    <!-- Text Main Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('text_main', __('messages.landing_cms.text_main').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('text_main', $sectionTwo['text_main'], ['class' => 'form-control form-control-solid','maxLength' => '50','placeholder' => 'Enter Text Main']) }}
    </div>

    <!-- Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('text_secondary', __('messages.landing_cms.text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('text_secondary', $sectionTwo['text_secondary'], ['class' => 'form-control form-control-solid', 'required','maxLength' => '160','placeholder' => 'Enter Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Card One Text Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_one_text', __('messages.landing_cms.card_one_text').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_one_text', $sectionTwo['card_one_text'], ['class' => 'form-control form-control-solid','maxLength' => '35','placeholder' => 'Enter Card One Text']) }}
    </div>

    <!-- Card One Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_one_text_secondary', __('messages.landing_cms.card_one_text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_one_text_secondary', $sectionTwo['card_one_text_secondary'], ['class' => 'form-control form-control-solid','placeholder' => 'Enter Card One Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Card Two Text Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_two_text', __('messages.landing_cms.card_two_text').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_two_text', $sectionTwo['card_two_text'], ['class' => 'form-control form-control-solid','maxLength' => '35','placeholder' => 'Enter Card Two Text']) }}
    </div>

    <!-- Card Two Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_two_text_secondary', __('messages.landing_cms.card_two_text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_two_text_secondary', $sectionTwo['card_two_text_secondary'], ['class' => 'form-control form-control-solid','placeholder' => 'Enter Card Two Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Card third Text Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_three_text', __('messages.landing_cms.card_third_text').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_three_text', $sectionTwo['card_three_text'], ['class' => 'form-control form-control-solid','maxLength' => '35','placeholder' => 'Enter Card Third Text']) }}
    </div>

    <!-- Card third Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_three_text_secondary', __('messages.landing_cms.card_third_text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_three_text_secondary', $sectionTwo['card_three_text_secondary'], ['class' => 'form-control form-control-solid','placeholder' => 'Enter Card Third Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Card four Text Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_four_text', __('messages.landing_cms.card_four_text').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_four_text', $sectionTwo['card_four_text'], ['class' => 'form-control form-control-solid','maxLength' => '35','placeholder' => 'Enter Card Four Text']) }}
    </div>

    <!-- Card four Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_four_text_secondary', __('messages.landing_cms.card_four_text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_four_text_secondary', $sectionTwo['card_four_text_secondary'], ['class' => 'form-control form-control-solid','placeholder' => 'Enter Card Four Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Card five Text Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_five_text', __('messages.landing_cms.card_five_text').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_five_text', $sectionTwo['card_five_text'], ['class' => 'form-control form-control-solid','maxLength' => '35','placeholder' => 'Enter Card Five Text']) }}
    </div>

    <!-- Card five Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_five_text_secondary', __('messages.landing_cms.card_five_text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_five_text_secondary', $sectionTwo['card_five_text_secondary'], ['class' => 'form-control form-control-solid' ,'placeholder' => 'Enter Card Five Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Card six Text Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_six_text', __('messages.landing_cms.card_six_text').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_six_text', $sectionTwo['card_six_text'], ['class' => 'form-control form-control-solid','maxLength' => '35','placeholder' => 'Enter Card Six Text']) }}
    </div>

    <!-- Card six Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('card_six_text_secondary', __('messages.landing_cms.card_six_text_secondary').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('card_six_text_secondary', $sectionTwo['card_six_text_secondary'], ['class' => 'form-control form-control-solid','placeholder' => 'Enter Card Six Text Secondary']) }}
    </div>
</div>

<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
        {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-light btn-active-light-primary']) }}
    </div>
</div>

