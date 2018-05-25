<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')
                    ->unsigned()
                    ->nullable(false);
            $table->integer('categories_id')
                    ->unsigned()
                    ->nullable(false);
            $table->integer('user_id')
                    ->unsigned()
                    ->nullable(false);
            $table->timestamps();

            $table->foreign('content_id')
                    ->references('id')
                    ->on('contents')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('categories_id')
                    ->references('id')
                    ->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('content_categories');
    }
}
