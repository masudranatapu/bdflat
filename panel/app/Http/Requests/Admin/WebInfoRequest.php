<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WebInfoRequest extends FormRequest
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
            'meta_title'               => 'required',
            'meta_keywords'            => 'required',
            'meta_description'         => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'meta_title.required' => 'Please enter meta title!',
            'meta_keywords.required' => 'Please enter meta keywords!',
            'meta_description.required' => 'Please enter meta description!'
        ];
    }
}
