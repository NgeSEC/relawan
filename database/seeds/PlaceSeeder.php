<?php

use Illuminate\Database\Seeder;
use App\Models\Place;
use WebAppId\Content\Models\Category;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $objCategory = new Category;

        $categories[] = array('name' => 'posko', 'code' => 'posko', 'user_id' => '1');
        $categories[] = array('name' => 'shelter', 'code' => 'shelter', 'user_id' => '1');
        $categories[] = array('name' => 'disaster area', 'code' => 'disaster-area', 'user_id' => '1');

        for ($i = 0; $i < count($categories); $i++) {
            $result = $objCategory->getCategoryByCode($categories[$i]['code']);

            if ($result === null) {
                $objCategory->addCategory((Object)$categories[$i]);
            }
        }


        $file  = file_get_contents(__DIR__ . '/Json/posko-pengungsi.json');
        $json  = json_decode($file, true);

        $place = new Place();
        $place->addBulkPlace($json, 1, 1, 'Asia/Jakarta');


    }
}
