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
use Faker\Provider\Image;
use \App\Http\Middleware\XssSanitizer;

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


Route::get('/upload/image',[ImageController::class,'getIndex'])->middleware('auth');



Route::post('/upload/image',[ImageController::class,'postIndex'])->middleware('XssSanitizer')->middleware('auth')->middleware('verified');



//This is to show the image's permalink on our website
Route::get('snatch/{id}',[ImageController::class,'getSnatch'])->where('id', '[0-9]+');


//This route is to show all images.
Route::get('/',[ImageController::class,'getAll'])->name('home');


Route::get('/editImage/{photo:id}', [ImageController::class, 'getEditImage'])->middleware('auth');

Route::put('/editImage/{photo:id}', [ImageController::class, 'editImage'])->middleware('XssSanitizer')->middleware('auth')->middleware('verified');

Route::get('/profile/deleteAccount', [HomeController::class, 'getDeleteUser'])->middleware('auth');
Route::post('/profile/deleteAccount', [HomeController::class, 'deleteUserCheck'])->middleware('auth')->middleware('verified');

Route::get('/profile/deleteAccountImages', [HomeController::class, 'keepImagesUser'])->middleware('auth');
Route::delete('/profile/deleteAccountImages', [HomeController::class, 'deleteUser'])->middleware('auth')->middleware('verified');


//This route is to delete the image with the given ID
Route::get('/delete/{id}',[ImageController::class,'getDelete'])->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('password.confirm');


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index']);



Route::get('/profile/{user}', [UserPublicProfileController::class, 'profile'])->name('user.profile');



Route::get('/editProfileAvatar', [UserController::class, 'editProfileAvatar'])->middleware('auth');

Route::put('/editProfileAvatar', [UserController::class, 'updateAvatar'])->middleware('XssSanitizer')->middleware('auth');

Route::delete('/editProfileAvatar', [UserController::class, 'deleteProfileAvatar']);


Route::get('/editProfileBGImage', [UserController::class, 'editProfileBGImage'])->middleware('auth');

Route::put('/editProfileBGImage', [UserController::class, 'updateBGImage'])->middleware('XssSanitizer')->middleware('auth');


Route::get('/editProfileInfo', [UserController::class, 'editProfileInfo'])->middleware('auth');

Route::put('/editProfileInfo', [HomeController::class, 'profileUpdate'])->middleware('XssSanitizer')->middleware('auth');






Route::get('/error/{error}',[UserController::class,'getErrorHandler']);


Route::get('/changeEmail',[HomeController::class,'getChangeEmail'])->middleware('auth');

Route::put('/changeEmail',[HomeController::class,'changeEmail'])->middleware('XssSanitizer')->middleware('auth')->middleware('password.confirm');




/**********   LIKE/UNLIKE SYSTEM   **********/


Route::post('like/image/{id}', [ImageController::class, 'likeImage'])->name('like');














