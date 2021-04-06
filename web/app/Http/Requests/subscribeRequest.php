<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class subscribeRequest extends FormRequest
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
            'email'                     => 'required|unique:ss_subscribe|string|min:5|max:60',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'email.required'            => 'Email is required!',
            'email.unique'              => 'Email is already Exist!',
        ];
    }
}
