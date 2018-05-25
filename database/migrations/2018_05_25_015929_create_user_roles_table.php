<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->increments('id')
                ->comment('table to definition user and role');
            $table->integer('user_id')
                ->unsigned()
                ->comment('relation to users');
            $table->integer('role_id')
                ->unsigned()
                ->comment('relation to roles');
            $table->timestamps();

            /**
             * foregin key
             */

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
