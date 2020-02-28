<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenderTable extends Migration
{
  
    public function up()
    {
        if(!Schema::hasTable('gender')){
            Schema::create('gender', function (Blueprint $table) {
                $table->increments('id');
                $table->string('gender',6);
                $table->string('user_id');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('gender');
    }
}
