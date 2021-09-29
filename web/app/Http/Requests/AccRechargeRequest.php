<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccRechargeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'payment_method'               => 'required|integer|min:1|max:20',
            'bkash_no'                     => 'required|string|min:1|max:20',
            'rocket_no'                    => 'required|string|min:1|max:20',
            'recharged_mobile_no'          => 'required|string|min:10|max:11',
            'recharge_date'                => 'required',
            'amount'                       => 'required|max:10000',
            'txn_id'                       => 'required|max:50',
            'note'                         => 'nullable|string|max:1000',
            'image'                        => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'payment_method.required'             => 'Your name is required!',
            'bkash_no.required'            => 'Your email is required!',
            'rocket_no.required'          => 'Your subject is required!',
            'recharged_mobile_no.required'          => 'Message is required',
        ];
    }
}
