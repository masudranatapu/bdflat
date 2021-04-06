<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class postElectronicMobilRequest extends FormRequest
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
            'using_condition'           => 'required|string|min:3|max:20',
            'price'                     => 'required|min:0|max:11',
            'price_negotiable'          => 'nullable|integer|max:1',
            'product_type'              => 'nullable|integer|min:1',
            'brand'                     => 'required',
            'location'                  => 'required',
            'area'                      => 'required',
            'prod_model'                => 'nullable|integer|min:1',
            'edition'                   => 'nullable|max:60',
            'model_year'                => 'nullable|min:4|max:4',
            'registration_year'         => 'nullable|min:4|max:4',
            'transmission'              => 'required|string|max:20',
            'body_type'                 => 'nullable|string|max:20',
            'fuel_type[]'               => 'nullable|string|max:100',
            'engine_capacity'           => 'nullable|integer|max:99',
            'kilometers_run'            => 'nullable|integer|max:9999999999',
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
            'price.brand'               => 'This field is required',
            'price.prod_model'          => 'This field is required',
            'price.edition'             => 'Maximum 60 characters',
            'model_year.required'       => 'This field is required',
            'area.required'             => 'This field is required',
            'location.required'         => 'This field is required',
            'model_year.min'            => 'Minimum 11 digit',
            'model_year.max'            => 'Maximum 4 digit',
            'registration_year.required'    => 'This field is required',
            'registration_year.min'         => 'Minimum 11 digit',
            'registration_year.max'         => 'Maximum 4 digit',
            'transmission.required'         => 'This field is required',
            'transmission.max'              => 'Maximum 20 characters',
            'body_type.required'            => 'This field is required',
            'body_type.max'                 => 'Maximum 20 characters',
            'engine_capacity.required'      => 'This field is required',
            'engine_capacity.max'           => 'Maximum 99',
            'kilometers_run.required'       => 'This field is required',
            'kilometers_run.max'            => 'Maximum 9999999999',
            'description.required'          => 'This field is required',
            'description.min'               => 'Minimum 50 characters required',
            'description.max'               => 'Maximum 4000 characters',
            'mobile1.required'               => 'This field is required',
            'mobile1.min'                    => 'Minimum 11 digit',
            'mobile1.max'                    => 'Maximum 11 digit',
            'address.required'              => 'This field is required',
            'address.min'                   => 'Minimum 5 characters required',
            'address.max'                   => 'Maximum 150 characters',

           

        ];
    }
}
