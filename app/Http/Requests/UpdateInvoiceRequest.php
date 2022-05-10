<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     *
     * @return mixed
     */
    public function rules()
    {
        $rules = Invoice::$rules;
        $rules['invoice_id'] = 'required|is_unique:invoices,invoice_id,'.$this->route('invoice')->id;

        return $rules;
    }

    public function messages(): array
    {
        return Invoice::$messages;
    }
}
