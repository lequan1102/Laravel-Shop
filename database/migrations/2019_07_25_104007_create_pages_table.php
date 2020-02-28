<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{

    public function up()
    {
			if(!Schema::hasTable('admin')){
				Schema::create('pages', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->string('title');
					$table->string('excerpt')->nullable();
					$table->string('body');
					$table->string('image')->nullable();
					$table->string('slug');
					$table->string('meta_description')->nullable();
					$table->string('meta_keywords')->nullable();
					$table->integer('status')->nullable();
					$table->timestamps();
				});
			}
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
