<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|max:200|unique:events,title',
            'body' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'team' => 'required',
            'leader_id' => 'required',
            'file' => 'file'
        ];
    }
}
