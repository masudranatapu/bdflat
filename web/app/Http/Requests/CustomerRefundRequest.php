<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRefundRequest extends FormRequest
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
            'claiming'              => 'required',
            'comment'               => 'required|max:200',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'claiming.required'     => 'Claiming Reason is required!',
            'comment.required'      => 'Comment is required!',
        ];
    }

}
