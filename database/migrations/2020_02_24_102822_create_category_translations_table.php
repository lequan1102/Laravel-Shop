<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_translations')){
            Schema::create('category_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('category_id')->unsigned();
                $table->string('locale')->index();
                
                $table->string('name');
                $table->string('slug');
                $table->string('excerpt')->nullable();
                $table->string('seo_title')->nullable();
                $table->string('meta_keywords',200)->nullable();
                $table->string('meta_description',500)->nullable();

                $table->unique(['category_id','locale']);
                $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('category_translations');
    }
}
