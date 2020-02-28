<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{

    public function up()
    {
      if(!Schema::hasTable('category')){
        Schema::create('category', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('parent_id')->nullable();
          $table->integer('order')->nullable();
          $table->integer('author_id');
          $table->integer('status')->nullable()->default(1);
          $table->timestamps();
        });
      }
    }

    public function down()
    {
        Schema::dropIfExists('category');
    }
}
