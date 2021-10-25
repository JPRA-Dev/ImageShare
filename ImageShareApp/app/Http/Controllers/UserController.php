<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image As Image;
use  App\Models\User;

use App\Models\Photo;
use App\config\images;

class UserController extends Controller
{
    //
    public function profile(){
        return view('profile', array('user' => Auth::user()));

    }


    public function updateAvatar(Request $request) {
        
        //Handle the user upload of the avatar
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename));

            $user = User::find(auth()->user()->id);
            $user->avatar = $filename;
            $user->update();

        }
        return redirect('/profile/'.Auth()->user()->name);
    }

    public function updateBGImage(Request $request) {
        
        //Handle the user upload of the bg image
        if($request->hasFile('bgImage')) {
            $bgImage = $request->file('bgImage');
            $filename = time() . '.' . $bgImage->getClientOriginalExtension();
            Image::make($bgImage)->save( public_path('uploads/bgImages/' . $filename));

            $user = User::find(auth()->user()->id);
            $user->bgImage = $filename;
            $user->update();
        }
        return redirect('/profile/'.Auth()->user()->name);
    }

    public function editProfileInfo(){
        return view('editProfile.editProfileInfo', array('user' => Auth::user()));

    }

    public function editProfileAvatar(){
        return view('editProfile.editProfileAvatar', array('user' => Auth::user()));

    }

    public function editProfileBGImage(){
        return view('editProfile.editProfileBGImage', array('user' => Auth::user()));

    }

    public function errorHandler(){
        return view('layouts.error');
    }




}
