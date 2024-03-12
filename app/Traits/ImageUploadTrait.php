<?php

namespace App\Traits;
use Illuminate\Http\Request;

trait ImageUploadTrait{

    public function uploadImage(Request $request, $inputName, $path ){
        // if($request->hasFile($inputName)){
        //     $image = $request->{$inputName};
        //     $imageName = rand().'-'.$image->getClientOriginalName();
        //     $image->move(public_path($path), $imageName);
        //     return $path.'/'.$imageName;
        // }

        if($request->hasFile($inputName)){
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalName();
            $imageName = 'media_'.uniqid().'_'.$ext;
            $image->move(public_path($path), $imageName);
            return $path.'/'.$imageName;
        }
    }
}