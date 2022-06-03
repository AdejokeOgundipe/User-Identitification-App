<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Registration extends Model
{
    use HasFactory,Notifiable;

     protected $fillable =[
    "surname","other_names","email","nominees_location","phone_number","dob","gender","address","department","occupation","marital_status","image_path","other_info"];


    public function other_info(){
        return $this->hasMany('other_info');
    }
}
