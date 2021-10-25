<?php

namespace App\Http\Middleware;
use  App\Models\User;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateSameUser extends Middleware
{

public function profile($name)
    {
        $user = User::where('name', $name)->first();
        if ($user == User::find(auth()->user()->id)) {
            $userCheck = true;
        } else {
            $userCheck = false;
        }
        return $userCheck;
    }

}