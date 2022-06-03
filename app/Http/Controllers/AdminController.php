<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getRegisteredUsers(){
        $data =  Registration::get();
       return RegistrationResource::collection($data);

     }

}
