<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Role;

class CreateRoleRequest extends FormRequest
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
        return Role::$rules;
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'display_name.required' => 'Name field is required',
            'permission_id.required' => 'Please select any one permission',
        ];
    }
}
