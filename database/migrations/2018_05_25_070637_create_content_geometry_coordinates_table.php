<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentGeometryCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_geometry_coordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('geometry_id')
                ->unsigned()
                ->nulllable(false);
            $table->float('longitude',11,7)
                ->nullable(false)
                ->default(0);
            $table->float('latitude',11,7)
                ->nullable(false)
                ->default(0);
            $table->integer('user_id')
                ->nullable(false)
                ->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('content_geometry_coordinates');
    }
}
