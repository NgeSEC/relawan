<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceTypeContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_type_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')
                ->unsigned();
            $table->integer('place_type_id')
                ->unsigned();
            $table->timestamps();
            
            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('place_type_id')
                ->references('id')
                ->on('place_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_type_contents');
    }
}
