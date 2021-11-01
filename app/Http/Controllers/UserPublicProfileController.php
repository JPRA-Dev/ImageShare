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


        
        $userImages = DB::table('photos')->where('user', '=',  $user->id )->get();
        $userImagesPaginate = DB::table('photos')->where('user', '=',  $user->id )->paginate(4);

        $imageCount = count($userImages);

        
        
    

        $likedImages = DB::table("user_follower")->where('follower_id', $user->id )->pluck('following_id');

        if ($likedImages === NULL) {   
          

        }
        
        

        // ddd($likedImages[0]);
        
        

        foreach ($likedImages as $each) {
            $likedImagesShow[] = DB::table('photos')->where('id', '=', $each)->get();
            $likedImagesPaginate[] = DB::table('photos')->where('id', '=', $each)->paginate(2);
        }

        if(!isset($likedImagesShow)){
            $likedImagesShow = NULL;
        }

        if(!isset($likedImagesPaginate)){
            $likedImagesPaginate = NULL;
        }

        // $likedImagesShow->TOaR->paginate(2);

        // $likedImagesPaginate = DB::table('photos')->where('id', '=',  $likedImages[0])->paginate(2);
        // $likedImagesShow[] = DB::table('photos')->where('id', '=',  $likedImagesIds)->get();
        // $likedImagesShow = DB::table('photos')->where('id', '=', $likedImagesIds);

        
        


        
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
            ->with('userImagesPaginate', $userImagesPaginate)
            ->with('imageCount', $imageCount)
            ->with('likedImagesShow', $likedImagesShow)
            ->with('likedImagesPaginate', $likedImagesPaginate)
            ->with('imageLikesCount', $imageLikesCount);
    }
}
