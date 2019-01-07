<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 13:49
 */

namespace App\Repositories;


use Laravolt\Indonesia\Models\City;

/**
 * Class CityRepository
 * @package App\Repositories
 */
class CityRepository
{
    /**
     * @param City $city
     * @return mixed
     */
    public function getAll(City $city)
    {
        return $city->get();
    }
    
    /**
     * @param $provinceId
     * @param City $city
     * @return mixed
     */
    public function getCityByProvinceId($provinceId, City $city)
    {
        return $city->where('province_id', $provinceId)->get();
    }
}