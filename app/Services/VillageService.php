<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 14:13
 */

namespace App\Services;


use App\Repositories\VillageRepository;
use Laravolt\Indonesia\Models\Village;

/**
 * Class VillageService
 * @package App\Services
 */
class VillageService
{
    private $villageRepository;
    
    public function __construct()
    {
        $this->villageRepository = new VillageRepository();
    }
    
    /**
     * @return mixed
     */
    public function getAllVillage(){
        return $this->villageRepository->getAllVillages(new Village());
    }
    
    /**
     * @param $districtId
     * @return mixed
     */
    public function getVillageByDistrictId($districtId){
        return $this->villageRepository->getVillageByDistrictId(new Village(), $districtId);
    }
}