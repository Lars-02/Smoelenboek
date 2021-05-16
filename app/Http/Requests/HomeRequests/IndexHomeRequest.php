<?php

namespace App\Http\Requests\HomeRequests;

use Illuminate\Foundation\Http\FormRequest;

class IndexHomeRequest extends FormRequest
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
            'name' => 'required',
            'streetName' => 'required',
            'houseNumber' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
            'roomAmount' => 'required'
        ];
    }

    /**
    * Custom message for validation
    *
    * @return array
    */
    public function messages()
    {
        return [
            
        ];
    }
}