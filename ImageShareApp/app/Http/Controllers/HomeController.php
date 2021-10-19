<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use  App\Models\User; 


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

}
