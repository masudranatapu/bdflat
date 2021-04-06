<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class updatePasswordRequest extends FormRequest
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
                'old_password'  => 'required|string|min:6',
                'password'      => 'required|string|min:6|confirmed',
           ];

        return $rules;
    }

    public function messages()
    {
        return [
            'old_password.required'    => 'Old password is required',
            'password.required'        => 'Password is required',

        ];
    }
}
