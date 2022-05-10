<div id="editModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.payment.edit_payment') }}</h2>
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
            {{ Form::open(['id'=>'editPaymentForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide" id="editValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                        {{ Form::label('invoice',__('messages.invoice.invoice').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('invoice_id',null,['id'=>'edit_invoice_id','class' => 'form-control form-control-solid','readonly']) }}
                        {{ Form::hidden('invoice',null,['id'=>'invoice']) }}
                    </div>
                    <div class="form-group col-sm-4 mb-5 amount">
                        {{ Form::label('due_amount',__('messages.invoice.due_amount').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div class="input-group">
                            {{ Form::text('due_amount', null, ['id'=>'totalDue_amount','class' => 'form-control form-control-solid','placeholder'=>'Due amount','readonly','disabled']) }}
                            <a class="input-group-text bg-secondary border-0" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                {{ getCurrencySymbol() }}
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-sm-4 mb-5 amount">
                        {{ Form::label('paid_amount',__('messages.invoice.paid_amount').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div class="input-group">
                        {{ Form::text('paid_amount', null, ['id'=>'totalPaid_amount','class' => 'form-control form-control-solid','placeholder'=>'paid amount','readonly','disabled']) }}
                        <a class="input-group-text bg-secondary border-0" id="autoCode" href="javascript:void(0)"
                           data-toggle="tooltip"
                           data-placement="right" title="Currency Code">
                            {{ getCurrencySymbol() }}
                        </a>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                    {{ Form::label('payment_date',__('messages.payment.payment_date').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('payment_date', null, ['class' => 'form-control form-control-solid ', 'id' => 'edit_payment_date','placeholder'=>'Select date', 'autocomplete' => 'off','required','data-focus'=>"false"]) }}
                    </div>
                    <div class="form-group col-sm-4 mb-5 amount">
                        {{ Form::label('amount',__('messages.invoice.amount').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div class="input-group">
                        {{ Form::number('amount', null, ['id'=>'edit_amount','class' => 'form-control form-control-solid','step'=>'any','oninput'=>"validity.valid||(value=value.replace(/[e\+\-]/gi,''))",'min'=>'0','required','placeholder'=>'Enter Amount']) }}
                        <span id="error-msg" class="text-danger"></span>
                        <a class="input-group-text bg-secondary border-0" id="autoCode" href="javascript:void(0)"
                           data-toggle="tooltip"
                           data-placement="right" title="Currency Code">
                            {{ getCurrencySymbol() }}
                        </a>
                    </div>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        {{ Form::label('payment_mode',__('messages.payment.payment_mode').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }} 
                        {{ Form::text('payment_mode','Cash',['id'=>'edit_payment_mode','readonly','class' => 'form-control form-control-solid ']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('notes',__('messages.invoice.note').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::textarea('notes', null, ['id'=>'edit_payment_note','class' => 'form-control form-control-solid','rows'=>'5','required']) }}
                    </div>
                    {{ Form::hidden('paymentId',null,['id'=>'paymentId']) }}
                    {{ Form::hidden('transactionId',null,['id'=>'transactionId']) }}
                </div>
                <div class="text-right mt-5">
                    {{ Form::button(__('messages.common.pay'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'editFormButton','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing...", 'data-new-text' => __('messages.common.pay')]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-3"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
