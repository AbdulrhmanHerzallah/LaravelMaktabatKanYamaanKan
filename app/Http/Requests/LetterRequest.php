<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LetterRequest extends FormRequest
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
            'title' => 'required|max:230',
            'body' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => __('messages.title.required'),
            'body.required' => __('messages.body.required.letter'),

        ];
    }
}
