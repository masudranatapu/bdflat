<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequirementsRequest extends FormRequest
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
            'itemCon'               => 'required',
            'property_type'         => 'required|integer',
            'minimum_size'          => 'required|integer',
            'maximum_size'          => 'required|integer',
            'minimum_budget'        => 'required|integer',
            'maximum_budget'        => 'required|integer',
            'rooms'                 => 'required',
            'condition'             => 'required',
            'time'                  => 'required',
            'requirement_details'   => 'max:1000',
            'alert'                 => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'itemCon.required'          => 'Looking For Property is required!',
            'property_type.required'    => 'property type is required!',
            'minimum_size.required'     => 'Minimum Size is required!',
            'maximum_size.required'     => 'Maximum Size is required!',
            'minimum_budget.required'   => 'Minimum Budget is required!',
            'maximum_budget.required'   => 'Maximum Budget is required!',
            'rooms.required'            => 'Bedrooms is required!',
            'condition.required'        => 'Property Condition is required!',
            'time.required'             => 'Preferred time to contact is required!',
            'alert.required'            => 'Email Alert is required!',
        ];
    }



}
