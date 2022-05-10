<div id="addModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.tax.add_tax') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                </button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.common.name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null, ['id'=>'name','class' => 'form-control form-control-solid', 'required','placeholder' => 'Tax Name']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('value', __('messages.common.value').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::number('value', null, ['id'=>'value','class' => 'form-control form-control-solid','oninput'=>"validity.valid||(value=value.replace(/[e\+\-]/gi,''))",'min'=>'0','value'=>'0','step'=>'.01', 'required','placeholder' => 'Tax Value']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('is_default', 'Is Default:', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div class="form-check form-check-custom form-check-solid">
                            <div class="btn-group">
                                <input class="form-check-input" type="radio" name="is_default" value="1"
                                       id="flexRadioDefault"/>
                                <label class="form-check-label" for="flexRadioDefault">
                                    {{ __('messages.tax.yes').':' }}
                                </label>
                                <input class="form-check-input mx-2" type="radio" name="is_default" value="0"
                                       id="flexRadioDefault" checked/>
                                <label class="form-check-label" for="flexRadioDefault">
                                    {{ __('messages.tax.no').':' }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-3"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

