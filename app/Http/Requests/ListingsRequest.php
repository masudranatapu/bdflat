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
            'property_type'     => 'required|integer',
            'city'              => 'required|integer',
            'area'              => 'required|integer',
            'house'              => 'required|integer',
            'road'              => 'required|integer',
            'address'           => 'required|max:190',
            'condition'         => 'required|integer',
            'property_price'    => 'required|integer',
            'contact_person'    => 'required|max:45',
            'mobile'            => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15',
            'floor'             => 'nullable|integer',
            'facing'            => 'required|integer',
            'description'       => 'max:4000',
            'image'             => 'mimes:jpeg,jpg,png,gif',
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
            'house.required'             => 'House is required!',
            'road.required'             => 'Road is required!',
            'address.required'          => 'Address is required!',
            'condition.required'        => 'Property Condition is required!',
            'property_price.required'   => 'Property Price is required!',
            'contact_person.required'   => 'Contact Person is required!',
            'mobile.required'           => 'Mobile Number is required!',
            'mobile.regex'              => 'Mobile Number Should Less Than 15 Character & Follow Mobile Number Format',
            'contact_person_2.required' => 'Contact Person is required!',
            // 'mobile_2.required'         => 'Mobile Number is required!',
            // 'mobile_2.regex'            => 'Mobile Number Should Less Than 15 Character & Follow Mobile Number Format',
            'listing_type.required'     => 'Listing Type is required!',
        ];
    }



}
