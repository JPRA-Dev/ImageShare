<?php

use App\Http\Controllers\Auth\VerificationController;
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
// Route::post('/upload/image',[ImageController::class,'postIndex'])->middleware('auth')->middleware('verified');


//This is to show the image's permalink on our website
Route::get('snatch/{id}',[ImageController::class,'getSnatch'])->where('id', '[0-9]+');
//Route::get('snatch/{id}',array('as'=>'get_image_information','uses'=>'ImageController@getSnatch'))->where('id', '[0-9]+');

// Route::get('snatch/{id}',[ImageController::class,'getSnatch'])->where('id', '[0-9]+');

//This route is to show all images.
Route::get('/',[ImageController::class,'getAll'])->name('home');
//Route::get('all',array('as'=>'all_images','uses'=>'ImageController@getAll'));

Route::get('/editImage/{photo:id}', [ImageController::class, 'getEditImage'])->middleware('auth');

Route::put('/editImage/{photo:id}', [ImageController::class, 'editImage'])->middleware('auth');

Route::get('/profile/deleteAccount', [HomeController::class, 'getDeleteUser'])->middleware('auth');
Route::post('/profile/deleteAccount', [HomeController::class, 'deleteUserCheck'])->middleware('auth');

Route::get('/profile/deleteAccountImages', [HomeController::class, 'keepImagesUser'])->middleware('auth');
Route::delete('/profile/deleteAccountImages', [HomeController::class, 'deleteUser'])->middleware('auth');


//This route is to delete the image with the given ID
Route::get('/delete/{id}',[ImageController::class,'getDelete'])->where('id', '[0-9]+')->middleware('auth')->middleware('password.confirm');
//Route::get('delete/{id}', array('as'=>'delete_image','uses'=>'ImageController@getDelete'))->where('id', '[0-9]+');

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index']);

// Route::get('/verifyEmail', [VerificationController::class, 'index'])->name('home');

// Route::get('/profile', [UserController::class, 'profile']);

Route::get('/profile/{user}', [UserPublicProfileController::class, 'profile'])->name('user.profile');



Route::get('/editProfileAvatar', [UserController::class, 'editProfileAvatar'])->middleware('auth');

Route::put('/editProfileAvatar', [UserController::class, 'updateAvatar'])->middleware('auth');


Route::get('/editProfileBGImage', [UserController::class, 'editProfileBGImage'])->middleware('auth');

Route::put('/editProfileBGImage', [UserController::class, 'updateBGImage'])->middleware('auth');


Route::get('/editProfileInfo', [UserController::class, 'editProfileInfo'])->middleware('auth');

Route::put('/editProfileInfo', [HomeController::class, 'profileUpdate'])->middleware('auth');






Route::get('/error/{error}',[UserController::class,'errorHandler']);


Route::get('/changeEmail',[HomeController::class,'getchangeEmail'])->middleware('auth');

Route::put('/changeEmail',[HomeController::class,'changeEmail'])->middleware('auth')->middleware('password.confirm');










