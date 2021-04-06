<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeRequest extends FormRequest
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
          'name'          => 'required',
          'category'      => 'required',
          'sub_category'      => 'required',
        

      ];

      return $rules;
    }

    public function messages()
    {
        return [
            'name.required'         => 'Please enter name !',
            'category.required'     => 'Please select category !',
            'sub_category.required'     => 'Please select subcategory !',
         
        ];
    }
}
