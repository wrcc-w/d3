<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = Product::$rules;
        $rules['code'] = 'required|min:3|max:6|unique:products,code,'.$this->route('product')->id;

        return $rules;
    }

    public function messages()
    {
        return Product::$messages;
    }
}
