<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSystemRequest extends Request
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
            'name'       => 'required',
            'host'       => 'required',
            'dbversion'  => 'required',
            'dbname'     => 'required',
            'dbuser'     => 'required',
            'systemView' => 'required',
        );
        return $rules;
    }
}
