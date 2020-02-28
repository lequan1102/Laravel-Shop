<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
      if(!Schema::hasTable('products')){
        Schema::create('products', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('slug');
          $table->longText('body');
          $table->string('code')->nullable();
          $table->integer('price')->default(0);
          $table->string('image')->nullable();
          $table->string('thumbnails', 3000)->nullable();

          $table->string('excerpt')->nullable();
          $table->string('seo_title')->nullable();
          $table->string('meta_keywords',200)->nullable();
          $table->string('meta_description',500)->nullable();
          $table->timestamps();
        });
      }
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
