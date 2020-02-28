<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTranslationsTable extends Migration
{
    /**
     * Đa ngôn ngữ trong laravel, bên dưới là mô tả về cấu trúc đường đi của DB
     * 
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('question_translations')){
            Schema::create('question_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('question_id')->unsigned();
                $table->string('locale')->index();

                $table->string('name');
                $table->longText('body');
                $table->string('slug');
                $table->string('excerpt')->nullable();

                $table->unique(['question_id','locale']);
                $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
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
        Schema::dropIfExists('question_translations');
    }
}
