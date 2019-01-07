<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 14:03
 */

namespace App\Services;


use App\Repositories\DistrictRepository;
use Laravolt\Indonesia\Models\District;

/**
 * Class DistrictService
 * @package App\Services
 */
class DistrictService
{
    private $districtRepository;
    
    public function __construct()
    {
        $this->districtRepository = new DistrictRepository();
    }
    
    /**
     * @return mixed
     */
    public function getAllDistrict()
    {
        return $this->districtRepository->getAllDistrict(new District());
    }
    
    /**
     * @param $cityId
     * @return mixed
     */
    public function getAllDistrictByCityId($cityId)
    {
        return $this->districtRepository->getDistrictByCityId(new District(), $cityId);
    }
}