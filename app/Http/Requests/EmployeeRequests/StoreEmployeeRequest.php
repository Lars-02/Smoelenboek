<?php

namespace App\Http\Requests\EmployeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'firstname' => 'required|alpha|min:2|max:16',
            'lastname' => 'required|min:2|max:16',
            'phoneNumber' => array('required', 'regex:/(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/'),
            'photoUrl' => 'nullable',
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
