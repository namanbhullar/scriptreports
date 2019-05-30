<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValidateCreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required', 
			'email' => 'required|unique:lr_users|email',
			'password' => 'required|min:9|capital|number1',
			'confirm_password' => 'required|min:9|same:password'					
        ];
    }
}
