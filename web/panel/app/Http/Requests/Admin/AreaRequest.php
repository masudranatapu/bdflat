<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AreaRequest extends FormRequest
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
            'name'              => 'required'
        ];

        if(request()->pk_no)
        {
            $id = request()->pk_no;
            $rules['name']         = 'nullable|unique:ss_areas,name,'. $id.',pk_no'; 
        
        }else{
            $rules['name']         = 'nullable|unique:ss_areas,name,NULL,pk_no';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'         => 'Please enter area name!',
            'name.unique'             => 'Please enter unique area name!'

        ];
    }
}
