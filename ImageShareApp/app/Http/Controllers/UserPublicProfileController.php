<?php

namespace App\Http\Controllers;
use  App\Models\User; 

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
        $user = User::where('name', $name)->first();
        if ($user == User::find(auth()->user()->id)) {
            $userCheck = true;
        } else {
            $userCheck = false;
        }
        return view('user.profile', ['user' => $user, 'userCheck' => $userCheck]);
    }
}
