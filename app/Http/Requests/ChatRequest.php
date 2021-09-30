<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChatRequest extends FormRequest
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
            'postid'             => 'required|integer|min:1',
            'message'            => 'required|string|min:1|max:4000',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'postid.required'    => 'post is required!',
            'message.required'   => 'Message is required!',
            'message.min'        => 'Message minimun one character !',
            'message.max'        => 'Message maximum 4000 character !',
         
        ];
    }
    
}
