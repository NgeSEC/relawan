<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')
                ->comment('table to collect all user system');
            $table->integer('status_id')
                ->unsigned()
                ->nullable(false)
                ->default(1)
                ->comment('user status');
            $table->string('first_name')
                ->nullable(true)
                ->comment('user firt name');
            $table->string('last_name')
                ->nullable(true)
                ->comment('user last name');
            $table->string('email')
                ->unique()
                ->comment('email for username');
            $table->string('password')
                ->comment('Password user');
            $table->string('provider')
                ->comment('supporting login via sosmed')
                ->nullable();
            $table->rememberToken()
                ->comment('token for access via passport');
            $table->timestamps();
            /**
             * Relation table
             */
            $table->foreign('status_id')
                ->references('id')
                ->on('user_statuses')
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
        Schema::dropIfExists('users');
    }
}
