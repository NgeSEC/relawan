<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_statuses', function (Blueprint $table) {
            $table->increments('id')
                ->comment('references of content statuses');
            $table->string('name',20)
                ->index()
                ->nullable(false)
                ->comment('status name');
            $table->integer('user_id')
                ->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_statuses');
    }
}
