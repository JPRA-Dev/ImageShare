<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserPublicProfileController;
use Illuminate\Support\Facades\Input;
use App\User;


/*
|--------------------------------------------------------------------------

| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// //This is for the get event of the index page
Route::get('/upload/image',[ImageController::class,'getIndex'])->middleware('auth');
// //This is for the post event of the index.page
Route::post('/upload/image',[ImageController::class,'postIndex'])->middleware('auth');
// //Route::post('/',array('as'=>'index_page_post','before' =>'csrf', 'uses'=>'ImageController@postIndex'));

//This is to show the image's permalink on our website
Route::get('snatch/{id}',[ImageController::class,'getSnatch'])->where('id', '[0-9]+')->middleware('auth');
//Route::get('snatch/{id}',array('as'=>'get_image_information','uses'=>'ImageController@getSnatch'))->where('id', '[0-9]+');

//This route is to show all images.
Route::get('/',[ImageController::class,'getAll']);
//Route::get('all',array('as'=>'all_images','uses'=>'ImageController@getAll'));

//This route is to delete the image with the given ID
Route::get('/delete/{id}',[ImageController::class,'getDelete'])->where('id', '[0-9]+');
//Route::get('delete/{id}', array('as'=>'delete_image','uses'=>'ImageController@getDelete'))->where('id', '[0-9]+');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/profile/{user}', [UserPublicProfileController::class, 'profile'])->name('user.profile');

Route::get('/editProfileInfo', [UserController::class, 'editProfileInfo']);

Route::get('/editProfileAvatar', [UserController::class, 'editProfileAvatar']);

Route::get('/editProfileBGImage', [UserController::class, 'editProfileBGImage']);

Route::post('/editProfileAvatar', [UserController::class, 'updateAvatar']);

Route::post('/editProfileBGImage', [UserController::class, 'updateBGImage']);

Route::put('/editProfileInfo', [HomeController::class, 'profileUpdate']);


