<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactUsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {	
		//echo $this->name('create');exit;
        return true;
		
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {return [
            'name'=>'required',
			'email'=>'email|required',
			'message'=>'required'
        ];
    }
}
