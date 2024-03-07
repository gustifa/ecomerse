<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:100'],
            // 'email' => ['required', 'email','unique:users, email,'.Auth::user()->id]
            'email' => ['required', 'email','unique:users']
        ]);


        $user = Auth::user();

        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = rand().'-'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "uploads/".$imageName;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('Berhasil Update Profile');
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        // dd($request->all());
        $request->validate([
            'password_lama' => ['required', 'password_lama'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        
        toastr()->success('Berhasil Update Password Profile');
        return redirect()->back();
    }
}
