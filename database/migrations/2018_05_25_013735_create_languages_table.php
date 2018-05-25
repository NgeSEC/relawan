<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',5)
                ->index()
                ->nullable(false)
                ->comment('language code');
            $table->string('name',20)
                ->nullable(false)
                ->default()
                ->comment('language name');
            $table->integer('image_id')
                ->nullable(true)
                ->unsigned();
            $table->integer('user_id')
                ->unsigned();
            $table->timestamps();

            /**
             * foregin key
             */

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->foreign('image_id')
                ->references('id')
                ->on('files')
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
        Schema::dropIfExists('languages');
    }
}
