<?php

use App\Models\PlaceType;
use App\Repositories\PlaceTypeRepository;
use Illuminate\Database\Seeder;

class PlaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $placeTypeRepostory = new PlaceTypeRepository();
        
        $placeList = [];
        
        $objPlaceType = new \StdClass();
        $objPlaceType->code = '01';
        $objPlaceType->name = 'Warga';
        $placeList[] = $objPlaceType;
        
        $objPlaceType = new \StdClass();
        $objPlaceType->code = '02';
        $objPlaceType->name = 'Ternak';
        $placeList[] = $objPlaceType;
        
        for ($i = 0; $i < count($placeList); $i++) {
            $result = $placeTypeRepostory->getPlaceByCode($placeList[$i]->code, new PlaceType());
            if ($result == null) {
                $placeTypeRepostory->addPoskoType($placeList[$i], new PlaceType());
            }
        }
    }
}
