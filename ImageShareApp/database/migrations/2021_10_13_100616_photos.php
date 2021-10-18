<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Photos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',20)->default('');//the column that holds the image's name
            $table->string('image',50)->default('');//the column that holds the image's filename
            $table->string('description',100)->default('');
            $table->string('user')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}
