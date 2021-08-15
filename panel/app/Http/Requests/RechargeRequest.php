<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechargeRequest extends FormRequest
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
        $rules = [
            'amount' => 'required|min:1',
            'payment_type' => 'required',
            'attachment' => 'sometimes|file|mimes:jpg,png,jpeg,pdf',
        ];

        if ($this->get('payment_type') == 1) {
            $rules['method'] = 'required|min:1';
            $rules['payment_account'] = 'required|min:1';

            if ($this->get('method') == 4) {
                $rules['bank_name'] = 'required';
                $rules['bank_acc_name'] = 'required';
                $rules['bank_acc_no'] = 'required';
                $rules['slip_number'] = 'required';
            } else if ($this->get('method') != 6) {
                $rules['bkash'] = 'required';
            }
        }

        return  $rules;
    }
}
