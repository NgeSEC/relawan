<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLaravoltForeignToContentGeometryCoordinates extends Migration
{
    protected $province = 'province_id';
    protected $city = 'city_id';
    protected $district = 'district_id';
    protected $village = 'village_id';
    protected $prefix = 'laravolt.indonesia.table_prefix';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content_geometry_coordinates', function (Blueprint $table) {
            $table->char($this->province,2)
                ->after('user_id')
                ->nullable(false);
            $table->char($this->city,4)
                ->after($this->province)
                ->nullable(false);
            $table->char($this->district,7)
                ->after($this->city)
                ->nullable(false);
            $table->char($this->village,10)
                ->after($this->district)
                ->nullable(false);

            $table->foreign($this->province)
                ->references('id')
                ->on(config($this->prefix) . 'provinces');
            $table->foreign($this->city)
                ->references('id')
                ->on(config($this->prefix) . 'cities');
            $table->foreign($this->district)
                ->references('id')
                ->on(config($this->prefix) . 'districts');
            $table->foreign($this->village)
                ->references('id')
                ->on(config($this->prefix) . 'villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_geometry_coordinates', function (Blueprint $table) {
            $table->dropForeign('content_geometry_coordinates_province_id_foreign');
            $table->dropForeign('content_geometry_coordinates_city_id_foreign');
            $table->dropForeign('content_geometry_coordinates_district_id_foreign');
            $table->dropForeign('content_geometry_coordinates_village_id_foreign');

            $table->dropColumn($this->province);
            $table->dropColumn($this->city);
            $table->dropColumn($this->district);
            $table->dropColumn($this->village);
        });
    }
}
