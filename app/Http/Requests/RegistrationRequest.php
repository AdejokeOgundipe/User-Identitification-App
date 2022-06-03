<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class RegistrationRequest extends FormRequest
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
             'surname' => "required|min:3|max:255",
            'other_names' => "required|min:3|max:255",
            'email' =>"required|email",
            'phone_number' =>"required",
            'dob' =>"required",
            'gender' =>"required|min:2|max:6",
            'address' =>"required",
            'department' =>"required",
            'occupation' =>"required",
            'marital_status' =>"required",

        ];
    }

        /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->error($validator->errors()->first(), $validator->errors()->toArray()));
    }
}
