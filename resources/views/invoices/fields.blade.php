<div class="container-xxl">
    <div class="d-flex flex-column align-items-start flex-xxl-row">
        <div class="d-flex align-items-center flex-equal fw-row me-4 order-2">
            <div class="">
                {{ Form::label('client_id', __('messages.invoice.client').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::select('client_id', $clients, $client_id ?? null, ['class' => 'form-select form-select-solid fw-select', 'id' => 'client_id', 'placeholder' => 'Select Client','required','data-control' =>'select2']) }}
            </div>
        </div>

        <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4 align-self-end"
             data-bs-toggle="tooltip"
             data-bs-trigger="hover" title="" data-bs-original-title="invoice number">
            <span class="fs-2x fw-bolder text-gray-800">Invoice #</span>
            {{ Form::text('invoice_id', \App\Models\Invoice::generateUniqueInvoiceId(), ['class' => 'form-control form-control-solid fs-2x p-0', 'required', 'id' => 'invoiceId', 'maxlength' => 6,'onkeypress'=>"return blockSpecialChar(event)",]) }}
        </div>

        <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row">
            <div class="">
                {{ Form::label('invoice_date', __('messages.invoice.invoice_date').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::text('invoice_date', null, ['class' => 'form-control form-control-solid', 'id' => 'invoice_date', 'autocomplete' => 'off','required']) }}
            </div>
        </div>
    </div>

    <div class="separator separator-dashed my-10"></div>
    <div class="mb-0">
        <div class="row gx-10 mb-5">
            <div class="col-lg-3 col-sm-12">
                <div class="mb-5">
                    {{ Form::label('discountType', __('messages.invoice.discount_type').(':'), ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::select('discount_type', $discount_type,0, ['class' =>'form-select form-select-solid fw-bold', 'id' => 'discountType', 'data-control' => 'select2']) }}
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="mb-5">
                    {{ Form::label('discount', __('messages.invoice.discount').(':'), ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::number('discount',0, ['id'=>'discount','class' => 'form-control form-control-solid','oninput'=>"validity.valid||(value=value.replace(/[e\+\-]/gi,''))",'min'=>'0','value'=>'0','step'=>'.01','pattern'=>"^\d*(\.\d{0,2})?$"]) }}
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="mb-5">
                    {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::select('status', $statusArr,null, ['class' => 'form-select form-select-solid fw-bold', 'id' => 'status','required','data-control' => 'select2']) }}
                </div>
            </div>
            <div class="mb-5 col-lg-3 col-sm-12">
                {{ Form::label('due_date', __('messages.invoice.due_date').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::text('due_date', null, ['class' => 'form-control form-control-solid', 'id' => 'due_date', 'autocomplete' => 'off','required']) }}
            </div>
            <div class="mb-5 col-lg-6 col-sm-12">
                {{ Form::label('templateId', __('messages.setting.invoice_template').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::select('template_id', $template,\App\Models\Setting::DEFAULT_TEMPLATE ?? null, ['class' => 'form-select form-select-solid fw-bold', 'id' => 'templateId','required','data-control' => 'select2']) }}
            </div>
        </div>
    </div>
    <div class="separator separator-dashed my-10"></div>
    <div class="mb-0">
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
            <button type="button" class="btn btn-sm btn-primary text-start"
                    id="addItem"> {{ __('messages.invoice.add') }}</button>
        </div>
        <div class="table-responsive">
            <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" id="billTbl">
                <thead>
                <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                    <th class="min-w-50px w-50px text-center">#</th>
                    <th class="min-w-300px w-475px required">{{ __('messages.product.product') }}</th>
                    <th class="min-w-100px w-100px required">{{ __('messages.invoice.qty') }}</th>
                    <th class="min-w-150px w-150px required">{{ __('messages.product.unit_price') }}</th>
                    <th class="min-w-100px w-150px ">{{ __('messages.invoice.tax') }}</th>
                    <th class="min-w-100px w-150px text-end required">{{ __('messages.invoice.amount') }}</th>
                    <th class="min-w-75px w-75px text-end">{{ __('messages.common.action') }}</th>
                </tr>
                </thead>
                <tbody class="invoice-item-container">
                <tr class="border-bottom border-bottom-dashed tax-tr">
                    <td class="text-center item-number align-center">1</td>
                    <td class="table__item-desc w-25">
                        {{ Form::select('product_id[]', $products, null, ['class' => 'form-select form-select-solid fw-bold product','required','placeholder'=>'Select Product or Enter free text','data-control' => 'select2']) }}
                    </td>
                    <td class="table__qty">
                        {{ Form::number('quantity[]', null, ['class' => 'form-control qty form-control-solid','required', 'type' => 'number', "min" => 1,'oninput'=>"validity.valid||(value=value.replace(/\D+/g, ''))"]) }}
                    </td>
                    <td>
                        {{ Form::number('price[]', null, ['class' => 'form-control price-input price form-control-solid','oninput'=>"validity.valid||(value=value.replace(/[e\+\-]/gi,''))",'min'=>'0','value'=>'0','step'=>'.01','pattern'=>"^\d*(\.\d{0,2})?$",'required','onKeyPress'=>'if(this.value.length==8) return false;']) }}
                    </td>
                    <td class="w-100">
                        <select name="tax[]" class='form-select form-select-solid fw-bold tax'
                                data-control='select2' multiple="multiple">
                            @foreach($taxes as $tax)
                                <option value="{{ $tax->value }}"
                                        data-id="{{ $tax->id }}" {{ $defaultTax == $tax->id ? 'selected' : '' }}>{{ $tax->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-end item-total pt-8 text-nowrap">
                        <span>{{ getCurrencySymbol() }}</span> 0.00
                    </td>
                    <td class="text-end">
                        <button type="button" title="Delete"
                                class="btn btn-sm btn-icon btn-active-color-danger delete-invoice-item">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                    fill="black"></path>
                                            <path opacity="0.5"
                                                  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                  fill="black"></path>
                                            <path opacity="0.5"
                                                  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                  fill="black"></path>
                                        </svg>
                                    </span>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="separator separator-dashed"></div>
        <div class="row justify-content-end">
            <div class="col-lg-4 col-md-4 col-sm-6 end justify-content-end">
                <table class="table table-responsive-sm table-row-dashed g-5 gs-0 mb-0 fw-bolder text-gray-700 mr-3">
                    <tbody>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <td class="font-weight-bold fw-bolder text-gray-800">{{ __('messages.invoice.sub_total').(':') }}</td>
                        <td class="font-weight-bold fw-bolder text-gray-800 text-end">
                            <span>{{ getCurrencySymbol()  }}</span> <span id="total" class="price">
                                    0
                            </span>
                        </td>
                    </tr>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <td class="font-weight-bold fw-bolder text-gray-800">{{ __('messages.invoice.discount').(':') }}</td>
                        <td class="font-weight-bold fw-bolder text-gray-800 text-end">
                            <span>{{ getCurrencySymbol()  }}</span> <span id="discountAmount">
                                    0
                            </span>
                        </td>
                    </tr>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <td class="font-weight-bold fw-bolder text-gray-800">{{ __('messages.invoice.total_tax').(':') }}</td>
                        <td class="font-weight-bold fw-bolder text-gray-800 text-end">
                            <span>{{ getCurrencySymbol()  }}</span> <span id="totalTax">
                                    0
                            </span>
                        </td>
                    </tr>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <td class="font-weight-bold fw-bolder text-gray-800">{{ __('messages.invoice.total').(':') }}</td>
                        <td class="font-weight-bold fw-bolder text-gray-800 text-end">
                            <span>{{ getCurrencySymbol() }}</span> <span id="finalAmount">
                                    0
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row justify-content-left">
            <div class="col-lg-12 col-md-12 col-sm-12 end justify-content-left mt-5 mb-5">
                <button type="button" class="btn btn-primary note" id="addNote"><i
                            class="fas fa-plus"></i>{{ __('messages.invoice.add_note_term') }}</button>
                <button type="button" class="btn btn-danger note" id="removeNote"><i
                            class="fas fa-minus"></i>{{ __('messages.invoice.remove_note_term') }}</button>
            </div>
            <div class="col-lg-6 mb-5 mt-5" id="noteAdd">
                {{ Form::label('note', __('messages.invoice.note').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::textarea('note',null,['class'=>'form-control','id'=>'note']) }}
            </div>
            <div class="col-lg-6 mb-5 mt-5" id="termRemove">
                {{ Form::label('term', __('messages.invoice.terms').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::textarea('term',null,['class'=>'form-control','id'=>'term']) }}
            </div>
        </div>
    </div>
</div>

<!-- Total Amount Field -->
{{ Form::hidden('amount',0, ['class' => 'form-control', 'id' => 'total_amount']) }}

<!-- Submit Field -->
<div class="d-flex mt-5">
    <div class="form-group col-sm-12">
        <button type="button" name="draft" class="btn btn-primary mx-3" id="saveAsDraft" data-status="0"
                value="0">{{ __('messages.common.save_draft') }}
        </button>
        <button type="button" name="save" class="btn btn-primary mx-3" id="saveAndSend" data-status="1"
                value="1">{{  __('messages.common.save_send') }}
        </button>
        <a href="{{ route('invoices.index') }}"
           class="btn btn-light btn-active-light-primary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
