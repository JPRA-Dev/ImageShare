<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image As Image;
use  App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Photo;
use App\config\images;

class UserController extends Controller
{
    //
    public function profile(){
        return view('profile', array('user' => Auth::user()));

    }


    // public function deleteAvatar(Request $request) {

    //     $user = User::find(auth()->user()->id);
    //     $user->avatar = $filename;

    //     if($user->avatar != "default.jpg"){
    //         $user->avatar->delete();
    //         return redirect('/profile/'.Auth()->user()->name)->with('request', $request);
    //     } else
    //         // //Let's first find the image
    //         // $image = Photo::find($id);
        
    //         // if(!$image) {
    //         //   abort(404)->with('error', 'Image not found!');
    //         // }
          
    //         // //If there's an image, we will continue to the deletingprocess
    //         // if($image) {
    //         //   //First, let's delete the images from FTP
    //         //   File::delete(Config::get('images.upload_folder').'/'.$image->image);
    //         //   File::delete(Config::get('images.thumb_folder').'/'.$image->image);
          
    //         //   //Now let's delete the value from database
    //         //   $image->delete();
          
    //         //   //Let's return to the main page with a success message
    //         //   return Redirect::to('/')->with('success','Image deleted successfully');
          
    //         // } else {
    //         //   //Image not found, so we will redirect to the indexpage with an error message flash data.
    //         //   return Redirect::to('/')->with('error','No image found with given ID');
    //         // }
      
    // }
        

    public function updateAvatar(Request $request) {
        

        $request->validate([
            'avatar' => ['file', 'max:2000'],
        ]);

        //Handle the user upload of the avatar
        if($request->hasFile('avatar')) {
            
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename));

            $user = User::find(auth()->user()->id);
            
            $oldAvatar = $user->avatar;

            if($oldAvatar =! "default.jpg") {

            File::delete(public_path('uploads/avatars/'.$oldAvatar));

            }

            $user->avatar = $filename;
            $user->update();

            return redirect('/profile/'.Auth()->user()->name)->with('success', 'Your profile picture was sucessfull updated.');

        } else {
        
            return redirect('/profile/'.Auth()->user()->name)->with('error', 'There was a problem uploading your profile picture. Please try again later');
        
        }
    }

    public function updateBGImage(Request $request) {

        $request->validate([
            'bgImage' => ['file'],
        ]);
        
        //Handle the user upload of the bg image
        if($request->hasFile('bgImage')) {
            $bgImage = $request->file('bgImage');
            $filename = time() . '.' . $bgImage->getClientOriginalExtension();
            Image::make($bgImage)->save( public_path('uploads/bgImages/' . $filename));

            $user = User::find(auth()->user()->id);
            
            $oldBgImage = $user->bgImage;

            if($oldBgImage =! "default.jpeg") {

            File::delete(public_path('uploads/bgImages/'.$oldBgImage));

            }
            $user->bgImage = $filename;
            $user->update();

            return redirect('/profile/'.Auth()->user()->name)->with('success', 'Your background picture was sucessfull updated.');

        } else {
            
            return redirect('/profile/'.Auth()->user()->name)->with('error', 'There was a problem uploading your background image. Please try again later');
        
        }
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

    public function getErrorHandler(){
        return view('errors.error');
    }




}
