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
        
        // User::where('name', $name)->first();
        $user = User::where('name', $name)->first();
        if (Auth::guest()){
            $userCheck = false;
        }else if ($user == User::find(auth()->user()->id)) {
            $userCheck = true;
        } else {
            $userCheck = false;
        }


        // $userImages = Photo::find($user);
        $userImages = DB::table('photos')->where('user', '=',  $user->id )->get();
        // return view('user.profile', ['user' => $user, 'userCheck' => $userCheck]);

        

        $imageCount = count($userImages);

        
        foreach($userImages as $images) {

            $imageLikes = DB::table("user_follower")->where('following_id', '=',  $images->id )->get();

        }
     

        if (isset($imageLikes)) {
            $imageLikesCount = count($imageLikes);
        } else {
            $imageLikesCount = 0;
        }
        

      


        return view('user.profile',compact('user', 'userCheck'))
            ->with('userImages', $userImages)
            ->with('imageCount', $imageCount)
            ->with('imageLikesCount', $imageLikesCount);
    }
}
