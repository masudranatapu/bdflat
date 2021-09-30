<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class postJobRequest extends FormRequest
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
            'price_to'                  => 'required|min:0|max:11',
            'product_type'              => 'nullable|integer|min:1',
            'location'                  => 'required',
            'area'                      => 'required',
            'business_function'         => 'required',
            'receive_applications_via'  => 'required',
            'total_vacancies'           => 'required|integer',
            'deadline'                  => 'required',
            'company_name'              => 'required',
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
            'price_to.required'         => 'This field is required',
            'price_to.min'                  => 'Minimum 0 is required',
            'price_to.max'                  => 'Maximum 11 digit',
            'brand.required'                => 'This field is required',
            'prod_model.required'           => 'This field is required',
            'edition.required'              => 'Maximum 60 characters',
            'model_year.required'           => 'This field is required',
            'area.required'                 => 'This field is required',
            'location.required'             => 'This field is required',
            'business_function.required'    => 'This field is required',
            'receive_applications_via.required'         => 'This field is required',
            'total_vacancies.required'      => 'This field is required',
            'deadline.required'             => 'This field is required',
            'company_name.required'         => 'This field is required',
            'model_year.min'                => 'Minimum 11 digit',
            'model_year.max'                => 'Maximum 4 digit',
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
            'custom_model.max'              => 'Maximum 60 characters',

           

        ];
    }
}
