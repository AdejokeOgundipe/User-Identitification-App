<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use App\Notifications\RegistrationNotification;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function registration(RegistrationRequest $request)
    {
        $data = $request->validated();
        $user = Registration::create($data);
        return response()->json(['message'=>'To complete your registration,Kindly upload your passport','data'=>$user]);
    }


    public function upload(ImageRequest $request){
    $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
    $data = Registration::where('email',$request->email)->get()->first();
    $data->image_path =[$uploadedFileUrl];
    $data->save();
    $data->notify(new RegistrationNotification($data));
       return new RegistrationResource($data,true);

    }

public function additionalDetails(Request $request){
    $other_info = [
        'email'=>$request->email,
        'action'=>'additionalDetails',
        'name'=>$request->name,
        'age'=>$request->age,
        'sex'=>$request->sex,
        'occupation'=>$request->occupation,
    ];
    if (in_array('additionalDetails', $other_info)) {
        $data = Registration::where('email',$other_info['email'])->get()->first();
        $data->other_info =[$other_info];
        $data->save();
        return new RegistrationResource($data);
    }

}


    public function webCam(Request $request){
        
    $img = $request->image;
    $folderPath = "uploads/";

    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[0];
    $image_base64 = base64_decode($image_parts[0]);
    $fileName = uniqid() . '.png';
    $file = $folderPath . $fileName;

   // Storage::put($file, $image_base64);
   return $file;

}

}
