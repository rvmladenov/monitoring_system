<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreSystemRequest extends Request
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
            'name'       => 'required',
            'host'       => 'required',
            'dbversion'  => 'required',
            'dbname'     => 'required',
            'dbuser'     => 'required',
            'dbuserpass' => 'required',
            'systemView' => 'required',
        );
        return $rules;
    }
}
