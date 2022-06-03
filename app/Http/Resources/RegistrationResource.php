<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'surname' =>$this->surname,
            'other_names' => $this->other_names,
            'email' =>$this->email,
            'phone_number' =>$this->phone_number,
            'dob' =>$this->dob,
            'gender' =>$this->gender,
            'address' =>$this->address,
            'department' =>$this->department,
            'occupation' =>$this->occupation,
            'marital_status' =>$this->marital_status,
            'image'=>$this->image_path,
            'other_info'=>$this->other_info,
        ];
    }
}
