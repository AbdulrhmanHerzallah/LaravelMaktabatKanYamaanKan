<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserByAdminRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|max:200',
            'number_of_vacations' => 'required',
            'name' => 'required|max:200',
            'salary' => 'required|max:200',
            'contract_starting_date' => 'required|max:200|date',
            'contract_ending_date' => 'required|max:200|date',
            'permission' => 'required|max:200',
            'national_identity' => 'required|max:200',
            'social_insurance_number' => 'required|max:200',
            'data_subscribe_social' => 'required|max:200|date',
            'gender' => 'required|max:1',
        ];
    }
}
