<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'bill_number' => 'required|unique:bills,bill_number',
            'tax' => 'between:0,100',
            'bill_type' => 'required',
            'clint_name' => 'required|max:255|string',
            'clint_address' => 'required|max:255|string',
            'clint_phone' => 'required|numeric',
            'product_name.*' => 'required|max:255',
            'price.0' => 'required|numeric',
            'price.*' => 'required|numeric',
            'dis_account.*' => 'min:0|min:',
            'note.*' => 'max:250'
        ];
    }
}
