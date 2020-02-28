<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAdminTable extends Migration
{
    /**
     * Bảng trung gian Admin & Roles.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('role_admin')){
            Schema::create('role_admin', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('role_id');
                $table->integer('admin_id');
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
        Schema::dropIfExists('role_admin');
    }
}
