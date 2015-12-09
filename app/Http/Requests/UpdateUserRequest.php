<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
        $rules = array(
            'id'         => 'required',
            'username'       => 'required',
            'name'       => 'required',
            'passwordRepeat' =>'required_with:passwordNew',
            'passwordNew'  => 'same:passwordRepeat',            
            'admin'     => 'required'
        );
        return $rules;
    }
}
