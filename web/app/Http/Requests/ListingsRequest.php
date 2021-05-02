<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListingsRequest extends FormRequest
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
        // dd(1);
        $rules = [
            'property_for'      => 'required',
            'property_type'     => 'required',
            'city'              => 'required',
            'area'              => 'required',
            'address'           => 'required',
            'condition'         => 'required',
            'property_price'    => 'required',
            'contactPerson'     => 'required',
            'mobile'            => 'required',
            'listing_type'      => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'property_for.required'     => 'Advertisement type is required!',
            'property_type.required'    => 'property type is required!',
            'city.required'             => 'City is required!',
            'area.required'             => 'Area is required!',
            'address.required'          => 'Address is required!',
            'condition.required'        => 'Property Condition is required!',
            'property_price.required'   => 'Property Price is required!',
            'contactPerson.required'    => 'Contact Person is required!',
            'mobile.required'           => 'Mobile Number is required!',
            'listing_type.required'     => 'Listing Type is required!',
        ];
    }



}
