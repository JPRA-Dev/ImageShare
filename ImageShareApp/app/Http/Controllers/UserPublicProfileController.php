<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserPublicProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'profile']]);
    }
    public function profile($name)
    {
        $user = User::find(auth()->user()->id);
        if (Auth::guest()){
            $userCheck = false;
        }else if ($user == User::find(auth()->user()->id)) {
            $userCheck = true;
        } else {
            $userCheck = false;
        }
        // return view('user.profile', ['user' => $user, 'userCheck' => $userCheck]);
        return view('user.profile',compact('user', 'userCheck'));
    }
}
