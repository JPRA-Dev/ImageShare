<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Followable;

class Photo extends Model {

    use Followable;

    //the variable that sets the table name
    protected $table = 'photos';
  
    //the variable that sets which columns can be edited
    protected $fillable = array('title','image','likes');
  
    //The variable which enables or disables the Laravel'stimestamps option. Default is true.
    public $timestamps = true;

   //rules of the image upload form
    public static $upload_rules = array(
        'title'=> 'required|min:3',
        'image'=> 'required|image',
    );

    public function needsToApproveFollowRequests()
    {
        // Your custom logic here
        return (bool) $this->private;
    }
  }
