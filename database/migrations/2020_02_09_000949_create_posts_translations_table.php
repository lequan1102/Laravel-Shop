<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTranslationsTable extends Migration
{
    /**
     * Đa ngôn ngữ trong laravel, bên dưới là mô tả về cấu trúc đường đi của DB
     * 
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('posts_translations')){
            Schema::create('posts_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('posts_id')->unsigned();
                $table->string('locale')->index();
                $table->string('title');
                $table->string('slug');
                $table->longText('body');
                $table->string('excerpt')->nullable();
                $table->string('seo_title')->nullable();
                $table->string('meta_keywords',100)->nullable();
                $table->string('meta_description',500)->nullable();

                $table->unique(['posts_id','locale']);
                $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_translations');
    }
}