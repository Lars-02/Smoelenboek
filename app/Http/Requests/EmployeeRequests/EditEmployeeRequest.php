<?php

namespace App\Http\Requests\EmployeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmployeeRequest extends FormRequest
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
            'firstname' => 'required|alpha|min:2|max:16',
            'lastname' => 'required|min:2|max:16',
            'phoneNumber' => array('required', 'regex:/^((\+31)|(0031)|0)(\(0\)|)(\d{1,3})(\s|\-|)(\d{8}|\d{4}\s\d{4}|\d{2}\s\d{2}\s\d{2}\s\d{2})$/'),
            'email' => 'required|email',
            'linkedInUrl' => array('nullable', 'regex:/^((http|https):\/\/)?+(www.linkedin.com\/in\/).+$/'),
            'photoUrl' => 'nullable|mimes:jpg,png,jpeg,webp|max:1024|dimensions:min_width=180,min_height=180,max_width=1000,max_height=1000',
            'departments' => 'required',
            'expertises' => 'nullable',
            'minors' => 'nullable',
            'lectorates' => 'nullable',
            'courses' => 'nullable',
            'roles' => 'required',
            'workDays' => 'required',
            'learningLines' => 'nullable',
            'hobbies' => 'nullable',
        ];
    }

    /**
    * Custom message for validation
    *
    * @return array
    */
    public function messages(): array
    {
        return [
            'linkedInUrl' => 'Uw linkedIn url moet beginnen met https://www.linkedin.com/in/.',
        ];
    }
}
