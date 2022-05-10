<?php

namespace App\Http\Requests;

use App\Models\Tax;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaxRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Tax::$rules;
        $rules['name'] = 'required|max:191|is_unique:taxes,name,'.$this->route('tax');

        return $rules;
    }
}
