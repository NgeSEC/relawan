<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 14:06
 */

namespace App\Http\Controllers\References;


use App\Http\Controllers\Controller;
use App\Services\DistrictService;

/**
 * Class DistrictController
 * @package App\Http\Controllers\References
 */
class DistrictController extends Controller
{
    public function index(DistrictService $districtService, $cityId)
    {
        return $districtService->getAllDistrictByCityId($cityId);
    }
}