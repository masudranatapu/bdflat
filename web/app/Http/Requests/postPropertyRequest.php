<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class postPropertyRequest extends FormRequest
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

            'scat_pk_no'                => 'required|integer|min:1|max:1000',
            'title'                     => 'required|string|min:10|max:60',
            'price'                     => 'required|min:0|max:11',
            'product_type'              => 'nullable|integer|min:1',
            'location'                  => 'required',
            'area'                      => 'required',
            //'bed'                       => 'required',
            //'bath'                      => 'required',
            //'size'                      => 'required',
            'description'               => 'required|string|min:50|max:4000',

            'mobile1'                   => 'required|string|min:11|max:11',
            'address'                   => 'required|string|min:5|max:150',


        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'scat_pk_no.required'       => 'This field is required',
            'title.required'            => 'This field is required',
            'title.min'                 => 'Minimum 10 characters required',
            'title.max'                 => 'Maximum 60 characters',
            'using_condition.required'  => 'This field is required',
            'price.required'            => 'This field is required',
            'price.min'                 => 'Minimum 0 is required',
            'price.max'                 => 'Maximum 11 digit',
            'area.required'             => 'This field is required',
            'location.required'         => 'This field is required',
            'bed.required'              => 'This field is required',
            'bath.required'             => 'This field is required',
            'description.required'      => 'This field is required',
            'description.min'           => 'Minimum 50 characters required',
            'description.max'           => 'Maximum 4000 characters',
            'mobile1.required'          => 'This field is required',
            'mobile1.min'               => 'Minimum 11 digit',
            'mobile1.max'               => 'Maximum 11 digit',
            'address.required'          => 'This field is required',
            'address.min'               => 'Minimum 5 characters required',
            'address.max'               => 'Maximum 150 characters',
            'size.required'             => 'This field is required',

           

        ];
    }
}
