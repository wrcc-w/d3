<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
        $rules = Client::$rules;
        $userId =  Client::whereId($this->route('client'))->first()->user->id;
        $rules['email'] = 'required|email:filter|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/|is_unique:users,email,'.$userId;
        $rules['password'] = '';
        $rules['contact'] = 'nullable|is_unique:users,contact,'.$userId;
        
        return $rules;
    }
}
