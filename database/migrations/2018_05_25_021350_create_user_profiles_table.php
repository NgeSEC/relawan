<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity')
                ->unique()
                ->index()
                ->comment('real identity for member');
            $table->integer('owner_id')
                ->unsigned()
                ->comment('relation to user system');
            $table->string('email')
                ->unique()
                ->index()
                ->comment('field for additional user email');
            $table->string('phone',20)
                ->comment('main phone number member');
            $table->string('phone_alternative',20)
                ->comment('alterntive phone for member');
            $table->enum('sex',['M','F','O'])
                ->index()
                ->comment('Sex for member');
            $table->text('address')
                ->comment('member address');
            $table->date('dob')
                ->comment('Day Of birth users');
            $table->integer('timezone')
                ->nullable(false)
                ->default('7');
            $table->integer('language_id')
                ->unsigned()
                ->references('id')
                ->on('languages')
                ->onUpdate('cascade');
            $table->integer('picture_id')
                ->unsigned();
            $table->integer('user_id')
                ->unsigned()
                ->comment('integrated to user update');
            $table->timestamps();

            /**
             * foregin key
             */

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->foreign('picture_id')
                ->references('id')
                ->on('files')
                ->onUpdate('cascade');
            
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('user_profiles');
    }
}
