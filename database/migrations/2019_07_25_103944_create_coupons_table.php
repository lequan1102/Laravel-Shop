<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{

    public function up()
    {
        if(!Schema::hasTable('coutpons')){
            Schema::create('coutpons', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('code',30);
                $table->string('type',50);
                $table->bigInteger('value');
                $table->string('percent_off',5);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('coutpons');
    }
}
