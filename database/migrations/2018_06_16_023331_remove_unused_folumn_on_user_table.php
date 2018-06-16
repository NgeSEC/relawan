<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnusedFolumnOnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $columns = [];
        if (Schema::hasColumn('users', 'first_name')) {
            array_push($columns, 'first_name');
        }

        if (Schema::hasColumn('users', 'last_name')) {
            array_push($columns, 'last_name');
        }

        if(count($columns)>0){
            Schema::table('users', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('first_name')
                ->nullable(true)
                ->comment('user firt name')
                ->after('id');
            $table->string('last_name')
                ->nullable(true)
                ->comment('user last name')
                ->after('first_name');
        });
    }
}
