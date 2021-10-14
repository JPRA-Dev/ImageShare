<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


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

//This is for the get event of the index page
Route::get('/',[ImageController::class,'getIndex']);
//This is for the post event of the index.page
Route::post('/',[ImageController::class,'postIndex']);
//Route::post('/',array('as'=>'index_page_post','before' =>'csrf', 'uses'=>'ImageController@postIndex'));

//This is to show the image's permalink on our website
Route::get('snatch/{id}',[ImageController::class,'getSnatch'])->where('id', '[0-9]+');
//Route::get('snatch/{id}',array('as'=>'get_image_information','uses'=>'ImageController@getSnatch'))->where('id', '[0-9]+');

//This route is to show all images.
Route::get('all',[ImageController::class,'getAll']);
//Route::get('all',array('as'=>'all_images','uses'=>'ImageController@getAll'));

//This route is to delete the image with the given ID
Route::get('delete/{id}',[ImageController::class,'getDelete'])->where('id', '[0-9]+');
//Route::get('delete/{id}', array('as'=>'delete_image','uses'=>'ImageController@getDelete'))->where('id', '[0-9]+');
