<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image As Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Photo;

class UserPublicProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'profile']]);
    }
    public function profile($name)
    {
        //Let's first take all images with a pagination feature


        $user = User::find(auth()->user()->id);
        if (Auth::guest()){
            $userCheck = false;
        }else if ($user == User::find(auth()->user()->id)) {
            $userCheck = true;
        } else {
            $userCheck = false;
        }

        $userImages = Photo::find($user);
        // return view('user.profile', ['user' => $user, 'userCheck' => $userCheck]);
        return view('user.profile',compact('user', 'userCheck'))->with('userImages', $userImages);;
    }
}
