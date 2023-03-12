<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Postrequest extends FormRequest
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
            'title' => 'required',
            'eventdesc' => 'required',
            'eventdate' => 'required'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'picart.required' => 'The Pic Art field is required',
            'title.required' => 'The Event Title field is required',
            'eventdesc.required' => 'The Event Description field is required',
            'eventdate.required' => 'The Event Date field is required'
        ];
    }
}
