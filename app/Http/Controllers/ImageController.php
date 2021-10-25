<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\config\images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image As Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use  App\Models\User; 



class ImageController extends Controller {

    protected $request;
  
  public function getIndex()
  {
    //Let's load the form view
    $user = User::find(auth()->user()->id);
    return view('tpl.uploadImage')->with('user', $user);;
  }

  public function getEditImage($id)
  {
    $image = Photo::find($id);
    //Let's load the form view

    if(!$image) {
      abort(404);
    }

    return view('tpl.editImage')->with('image',$image);
  }

  public function editImage(Request $request, Photo $photo){
    //validation rules
    // $image = Photo::find($id);

    //If there's an image, we will continue to the editing process
    
    // $photo->validate([
    //     'title' => ['string', 'max:20'],
    //     'description' => ['string', 'max:20']
    //     //'image' => ['file', 'max:20'],
    //     //'user' => ['string', 'max:20']
    // ]);
       
    $photo->title = $request['title'];
    $photo->description = $request['description'];
    // // $image->image = $image->image;
    // // $image->user = $image->user;
    $photo->update();
    
      //Let's return to the main page with a success message
      return Redirect::to('/')->with('success','Image info successfully updated');
  
}

  public function postIndex(Request $request)
{
  
  //Let's validate the form first with the rules I did at the model
  $validation = Validator::make($request->all(),Photo::$upload_rules);

  //If the validation fails, we redirect the user to the index page, with the error messages 
  if($validation->fails()) {
    return Redirect::to('/')->withInput()->withErrors($validation);
  }
  else {

    //If the validation passes, we upload the image to the database and process it
    $image = $request->file('image');

    //This is the original uploaded client name of the image
    $filename = $image->getClientOriginalName();
    //Because Symfony API does not provide filename//without extension, we will be using raw PHP here
    $filename = pathinfo($filename, PATHINFO_FILENAME);

    //We should salt and make an url-friendly version of//the filename
    //(In ideal application, you should check the filename//to be unique)
    $fullname = Str::slug(Str::random(8).$filename).'.'.$image->getClientOriginalExtension();

    //We upload the image first to the upload folder, then make a thumbnail from the uploaded image
    $upload = $image->move(Config::get( 'images.upload_folder'),$fullname);

    $user = User::find(auth()->user()->id);


    //Our model that we've created is named Photo, this library has an alias named Image, don't mix them two!
    //These parameters are related to the image processing class that we've included, not really related to Laravel.
    //Image::make(Config::get( 'images.upload_folder').'/'.$fullname)->resize(Config::get( 'images.thumb_width'),null, true)->save(Config::get( 'images.thumb_folder').'/'.$fullname);
    Image::make(Config::get( 'images.upload_folder').'/'.$fullname)->resize(Config::get( 'images.thumb_width'), null, 
    function($constraint) {$constraint->aspectRatio();})
    ->save(Config::get( 'images.thumb_folder').'/'.$fullname);

    //If the file is now uploaded, we show an error message to the user, else we add a new column to the databaseand show the success message
    if($upload) {

      //image is now uploaded, we first need to add a column to the database
      $insert_id = DB::table('photos')->insertGetId(
        array(
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'image' => $fullname,
          'user' => $user->id,
        )
      );

      //Now we redirect to the image's permalink
      return Redirect::to(URL::to('snatch/'.$insert_id))
      ->with('success','Your image was uploaded successfully!');
    } else {
      //image cannot be uploaded
      return Redirect::to('/')->withInput()->with('error','Sorry, the image could not be uploaded, please try again later.');
    }
  }
}

public function getSnatch($id) {
    //Let's try to find the image from database first
    $image = Photo::find($id);

    if(!$image) {
      abort(404);
    }

    $imageThumb = Photo::find($id)->paginate(1);
    $user = User::find($image->user);
    

    // $user = User::where('id', $userID)->first();
    $lastId = Photo::where('id', '<', $image->id)->max('id');
    $nextId = Photo::where('id', '>', $image->id)->min('id');
    
    // $nextPageNumber = $image->id + 1;
    
    $maxId = Photo::find($id)->max('id');
    $minId = Photo::find($id)->min('id');
    
    // $imageCount = count(DB::table('photos')->get());
    

    if ($lastId < $minId) {
      $lastId = $maxId;
    } else if ($nextId > $maxId) {
      $nextId = $minId;
    }
    
    
    //If found, we load the view and pass the image info asparameter, else we redirect to main page with errormessage
    if($image) {
      return View::make('tpl.permalink')
      ->with('image', $image)
      ->with('lastId', $lastId)
      ->with('nextId', $nextId)
      ->with('user', $user)
      // ->with('imageCount', $imageCount)
      ->with('imageThumb', $imageThumb);
    } else {
      return Redirect::to('/')->with('error','Image not found');
    }
}


public function getAll(){

    //Let's first take all images with a pagination feature
    $all_images = DB::table('photos')->orderBy('id','desc')->paginate(4);
  
    //Then let's load the view with found data and pass thevariable to the view
    return View::make('tpl.all_images')->with('images',$all_images);

    $likes = Photo::with('user')
    ->orderBy('posted_at', 'desc')
    ->get();
return view('home', ['likes' => $likes]);
}

public function getDelete($id) {
    //Let's first find the image
    $image = Photo::find($id);

    if(!$image) {
      abort(404);
    }
  
    //If there's an image, we will continue to the deletingprocess
    if($image) {
      //First, let's delete the images from FTP
      File::delete(Config::get('image.upload_folder').'/'.$image->image);
      File::delete(Config::get('image.thumb_folder').'/'.$image->image);
  
      //Now let's delete the value from database
      $image->delete();
  
      //Let's return to the main page with a success message
      return Redirect::to('/')->with('success','Image deleted successfully');
  
    } else {
      //Image not found, so we will redirect to the indexpage with an error message flash data.
      return Redirect::to('/')->with('error','No image found with given ID');
    }
}


}