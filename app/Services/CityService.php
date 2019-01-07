<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 13:53
 */

namespace App\Services;


use App\Repositories\CityRepository;
use Laravolt\Indonesia\Models\City;

/**
 * Class CityService
 * @package App\Services
 */
class CityService
{
    private $cityRepository;
    
    public function __construct()
    {
        $this->cityRepository = new CityRepository();
    }
    
    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->cityRepository->getAll(new City());
    }
    
    /**
     * @param $provinceId
     * @return mixed
     */
    public function getCityByProvinceId($provinceId)
    {
        return $this->cityRepository->getCityByProvinceId($provinceId, new City());
    }
}