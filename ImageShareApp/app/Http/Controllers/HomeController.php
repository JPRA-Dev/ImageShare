<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use  App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Photo;

use App\config\images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;

use Intervention\Image\Facades\Image As Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'firstName' => ['string', 'max:20'],
            'lastName' => ['string', 'max:20'],
            'name' => ['string', 'max:20'],
            'town' => ['string', 'max:20'],
            'work' => ['string', 'max:30'],
            'country' => ['string', 'max:20'],
            'website' => ['string', 'max:30'],
            'description' => ['string', 'max:200'],
        ]);
        
        $user = User::find(auth()->user()->id);
        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];
        $user->name = $request['name'];
        $user->town = $request['town'];
        $user->work = $request['work'];
        $user->country = $request['country'];
        $user->website = $request['website'];
        $user->description = $request['description'];
        $user->update();
        
        return redirect('/profile/'.Auth()->user()->name);
    }

    public function getchangeEmail()
    {
        return view('user.changeEmail', array('user' => Auth::user()));
    }



    public function changeEmail(Request $request){
        //validation rules

        $request->validate([
            'email' => ['string', 'max:50']
        ]);
        
        $user = User::find(auth()->user()->id);
        $user->email = $request['email'];
        $user->email_verified_at = null;
        
        $user->update();
        
        return redirect('/profile/'.Auth()->user()->name);
    }


    public function getDeleteUser()
    {
        return view('auth.deleteUserAccountVerify');
    }

    public function keepImagesUser()
    {
        return view('auth.deleteUserImagesVerify');
    }


    public function deleteUserCheck(Request $request) {

      if ($request['yes'] == "yes") {

        return redirect("/profile/deleteAccountImages");
        
      } else {

        return redirect('/profile/'.Auth()->user()->name);
      }
    }


    public function deleteUser(Request $request) {

        $user = User::find(auth()->user()->id);
        $images = DB::table('photos')->where('user', '=',  $user)->get();

        // $image = Photo::find($user);
        // $image = Photo::where('user', $user);
  
        // //If there's an image, we will continue to the deletingprocess
        // if($image) {
  
          
    

        if ($request['no'] == "no"){
            foreach ($images as $each) {
                File::delete(Config::get('image.upload_folder').'/'.$each->image);
                File::delete(Config::get('image.thumb_folder').'/'.$each->image);
                $each->delete();     
            }
        
        $user->delete();

        } else {
            // foreach ($userImages as $each) {
            //     $each->user = "0";
            //     $each->update();     
            // }
            
        $user->delete();
        }

        return redirect('/');

    }




}
