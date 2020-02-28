<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('products_translations')){
            Schema::create('products_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('products_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name');
                $table->string('slug');
                $table->longText('body');
                $table->string('excerpt')->nullable();
                $table->string('seo_title')->nullable();
                $table->string('meta_keywords',200)->nullable();
                $table->string('meta_description',500)->nullable();

                $table->unique(['products_id','locale']);
                $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('products_translations');
    }
}
