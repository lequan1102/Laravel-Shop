<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
			if(!Schema::hasTable('posts')){
				Schema::create('posts', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->string('image')->nullable();
					$table->int('category_id')->nullable();
					$table->foreign('category_id')->references('id')->on('category');
					$table->tinyInteger('author_id')->nullable();
					$table->string('thumbnails',1000)->nullable();
					$table->tinyInteger('status')->default(1);   //type bit sql ?? no support
					$table->tinyInteger('featured')->default(0); //type bit sql ?? no support
					// $table->softDeletes();
					$table->timestamps();
				});
			}
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
