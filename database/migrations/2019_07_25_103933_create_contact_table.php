<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{

    public function up()
    {
      if(!Schema::hasTable('contact')){
        Schema::create('contact', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email');
          $table->integer('phone')->nullable();;
          $table->text('message')->nullable();
          $table->string('company')->nullable();
          $table->timestamps();
        });
      }
    }

    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
