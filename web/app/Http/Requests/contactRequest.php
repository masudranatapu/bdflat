<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class contactRequest extends FormRequest
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
            'name'                      => 'required|string|min:2|max:60',
            'email'                     => 'required|string|min:5|max:60',
            'subject'                   => 'required|string|min:3|max:120',
            'capt'                      => 'required',
            'message'                   => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'             => 'Your name is required!',
            'email.required'            => 'Your email is required!',
            'subject.required'          => 'Your subject is required!',
            'capt.required'             => 'Addition problem input field is required!',
            'message.required'          => 'Message is required',
        ];
    }
}
