<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherInfoRequest extends FormRequest
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
            'email'=>$this->email,
            'action'=>'additionalDetails',
            'name'=>$this->name,
            'age'=>$this->age,
            'sex'=>$this->sex,
            'occupation'=>$this->occupation,
        ];
    }
}
