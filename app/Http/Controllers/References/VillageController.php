<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 14:16
 */

namespace App\Http\Controllers\References;


use App\Http\Controllers\Controller;
use App\Services\VillageService;

/**
 * Class VillageController
 * @package App\Http\Controllers\References
 */
class VillageController extends Controller
{
    public function index(VillageService $villageService, $districtId)
    {
        return $villageService->getVillageByDistrictId($districtId);
    }
}