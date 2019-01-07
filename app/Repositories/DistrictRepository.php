<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 14:02
 */

namespace App\Repositories;


use Laravolt\Indonesia\Models\District;

class DistrictRepository
{
    /**
     * @param District $district
     * @return mixed
     */
    public function getAllDistrict(District $district){
        return $district->get();
    }
    
    /**
     * @param District $district
     * @param $cityId
     * @return mixed
     */
    public function getDistrictByCityId(District $district, $cityId){
        return $district->where('city_id', $cityId)->get();
    }
}