<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        return [
            'first_name' => 'required|max:191',
            'last_name'  => 'required|max:191',
            'email'      => 'required|email|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/|is_unique:users,email,'.$this->route('user')->id,
            'contact'    => 'required|is_unique:users,contact,'.$this->route('user')->id,
            'status'     => 'nullable',
        ];
    }
}
