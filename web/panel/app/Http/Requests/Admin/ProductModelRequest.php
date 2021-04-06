<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductModelRequest extends FormRequest
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
        return [
            'name'              => 'required',
            'brand'             => 'required',
            'sub_category'       => 'required',
            'category'       => 'required',
            
        ];

    }

    public function messages()
    {
        return [
            'name.required'             => 'Please enter model name!',
            'brand.required'            => 'Please enter model brand!',
            'category.required'      => 'Please select category!',
            'sub_category.required'      => 'Please select subcategory!',
           
        ];
    }
}
