<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use App\Models\Photo;



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
            'firstName' => ['string', 'min:3', 'max:20'],
            'lastName' => ['string', 'min:3', 'max:20'],
            'name' => ['string', 'min:3', 'max:20'],
            'town' => ['string', 'min:3', 'max:20'],
            'work' => ['string', 'min:3', 'max:30'],
            'country' => ['string', 'min:3', 'max:20'],
            'website' => ['string', 'min:5', 'url', 'max:30'],
            'description' => ['string', 'min:3', 'max:200'],
        ]);
        
        // if ($validator->fails()) {
        //     $message = $validator->errors()->first();
        // } else {
        //     $message = "Profile Updated";
        // }

        
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
        
        return redirect('/profile/'.$request['name'])->with('success', 'Your info was sucessfull updated');
    }

    public function getChangeEmail()
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

       
        
        return redirect('profile/'.Auth()->user()->name)->with('success', 'Your email has been changed! A confirmation has been sent to your new email address.');
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
        
        $images = DB::table('photos')->where('user', '=',  $user->id);
        $imagesArray = $images->get();

   

        if ($request['no'] == "no"){
            foreach ($imagesArray as $each) {
                File::delete(Config::get('images.upload_folder').'/'.$each->image);
                File::delete(Config::get('images.thumb_folder').'/'.$each->image);  
            }

        $images->delete();
        $user->delete();

        } else {
      
        $user->delete();
        
        }

        return redirect('/')->with('success', 'Your profile was deleted!');

    }



}
