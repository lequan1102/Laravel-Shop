<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Đa ngôn ngữ trong laravel, bên dưới là mô tả về cấu trúc đường đi của DB
     * 
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('question')){
            Schema::create('question', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->tinyInteger('author_id')->nullable();
                $table->tinyInteger('status')->default(1);   //type bit sql ?? no support
                $table->timestamps();
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
        Schema::dropIfExists('question');
    }
}
