<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
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
            'reject_reason'             => 'required|string|min:2|max:60',
            'email'                     => 'required|string|min:5|max:60',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'reject_reason.required'    => 'Reason is required!',
            'email.required'            => 'Your email is required!',
         
        ];
    }
    
}
