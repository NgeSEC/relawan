<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Table to collect all files');
            $table->string('name')
                ->index();
            $table->string('description')
                ->nullable(true)
                ->comment('Description For SEO Image');
            $table->string('alt', 100)
                ->nullable(true)
                ->comment('alt for image SEO');
            $table->string('path')
                ->nullable(false)
                ->default('uploads');
            $table->integer('mime_type_id')
                ->unsigned()
                ->comment('Relation to mime type');
            $table->integer('owner_id')
                ->unsigned()
                ->comment('who is the owner of the files');
            $table->integer('user_id')
                ->unsigned()
                ->comment('user change the files');
            $table->timestamps();

            /**
             * foregin key
             */

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->foreign('mime_type_id')
                ->references('id')
                ->on('mime_types')
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
        Schema::dropIfExists('files');
    }
}
