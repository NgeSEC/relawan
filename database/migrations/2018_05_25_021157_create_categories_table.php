<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')
                ->comment('table for collect category data');
            $table->string('code', 20)
                ->unique()
                ->nullable(false)
                ->comment('category code');
            $table->string('name', 50)
                ->nullable(false)
                ->default('')
                ->comment('category name');
            $table->integer('user_id')
                ->unsigned()
                ->comment('who is the owner of the data');
            $table->timestamps();

            /**
             * Relation to database
             */
            $table->foreign('user_id')
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
        Schema::dropIfExists('categories');
    }
}
