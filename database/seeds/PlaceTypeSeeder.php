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
        
        $placeTypeRepository = new PlaceTypeRepository();
        
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
            $result = $placeTypeRepository->getPlaceTypeByCode($placeList[$i]->code, new PlaceType());
            if (count($result) == 0) {
                $placeTypeRepository->addPlaceType($placeList[$i], new PlaceType());
            }
        }
    }
}
