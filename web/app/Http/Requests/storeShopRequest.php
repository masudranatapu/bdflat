<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeShopRequest extends FormRequest
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

            'name'                      => 'required|string|min:1|max:200',
            'open'                      => 'required|min:1|max:200',
            'address'                   => 'required|min:3|max:200',
            'contact'                   => 'required|min:0|max:11',
            'about'                     => 'required|string',
            'banner'                    => 'nullable',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'       => 'Name is required',
            'open.required'       => 'Opening time is required',
            'address.required'    => 'Shop address is required',
            'contact.required'    => 'Contact is required',
            'about.required'      => 'About shop is required',
        ];
    }
}
