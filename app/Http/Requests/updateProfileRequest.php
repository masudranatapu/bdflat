<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateProfileRequest extends FormRequest
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

            'name'          => 'required|min:1',
            'email'         => 'required',
            'mobile'        => 'required',
            'seller_type'   => 'required',
            'city'          => 'required',


        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'         => 'Please enter name',
            'email.required'        => 'Please enter email',
            'mobile.required'       => 'Please enter mobile',
            'city.required'         => 'Please select city',
            'seller_type.required'  => 'Please select seller type',

        ];
    }
}
