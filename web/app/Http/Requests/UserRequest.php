<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'name'             => 'required|min:2',
            'email'            => 'required',
            'mobile'           => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'    => 'Name is required!',
            'email.required'   => 'Email is required!',
//            'email.unique'     => 'Email Already Exist',
            'mobile.required'  => 'Mobile is required!',

        ];
    }

}
