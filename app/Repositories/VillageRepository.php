<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 14:12
 */

namespace App\Repositories;


use Laravolt\Indonesia\Models\Village;

/**
 * Class VillageRepository
 * @package App\Repositories
 */
class VillageRepository
{
    /**
     * @param Village $village
     * @return mixed
     */
    public function getAllVillages(Village $village)
    {
        return $village->get();
    }
    
    /**
     * @param Village $village
     * @param $districtId
     * @return mixed
     */
    public function getVillageByDistrictId(Village $village, $districtId)
    {
        return $village->where('district_id', $districtId)->get();
    }
}