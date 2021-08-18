<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $userID = $this->route()->parameter('id');

        if ($this->get('user_type') == 2) {
            $rules = [
                'user_type' => 'required',
                'name' => 'required|max:50',
                'email' => 'required|email|unique:WEB_USER,EMAIL,' . $userID . ',PK_NO',
                'images' => 'sometimes|array|min:1',
                'images.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
                'mobile_no' => 'required|max:20',
                'listing_limit' => 'required'
            ];
        } else {
            $rules = [
                'user_type' => 'required',
                'company_name' => 'required|max:50',
                'contact_person_name' => 'required|max:50',
                'designation' => 'required|max:255',
                'email' => 'required|email|unique:WEB_USER,EMAIL,' . $userID . ',PK_NO',
                'images' => 'sometimes|array|min:1',
                'images.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
                'office_address' => 'required|max:200',
                'mobile_no' => 'required|max:20',
                'about_company' => 'required',
                'listing_limit' => 'required'
            ];
        }

        return $rules;
    }
}