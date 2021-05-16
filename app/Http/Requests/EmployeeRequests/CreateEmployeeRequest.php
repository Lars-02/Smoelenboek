<?php

namespace App\Http\Requests\EmployeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'user_id' => 'required|unique:employees',
            'firstname' => 'required|alpha|min:2|max:40',
            'lastname' => 'required|min:2|max:40',
            'phoneNumber' => array('required', 'regex:/^((\+31)|(0031)|0)(\(0\)|)(\d{1,3})(\s|\-|)(\d{8}|\d{4}\s\d{4}|\d{2}\s\d{2}\s\d{2}\s\d{2})$/'),
            'departments' => 'required|exists:departments,id',
            'expertises' => 'required|exists:expertises,id',
            'roles' => 'required|exists:roles,id',
            'workDays' => 'required|exists:work_days,id',
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