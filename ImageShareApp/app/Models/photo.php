<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    //the variable that sets the table name
    protected $table = 'photos';
  
    //the variable that sets which columns can be edited
    protected $fillable = array('title','image');
  
    //The variable which enables or disables the Laravel'stimestamps option. Default is true.
    public $timestamps = true;

   //rules of the image upload form
    public static $upload_rules = array(
        'title'=> 'required|min:3',
        'image'=> 'required|image',
    );
  }
