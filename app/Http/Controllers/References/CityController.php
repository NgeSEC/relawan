<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Services\CityService;

/**
 * Class CityController
 * @package App\Http\Controllers\References
 */
class CityController extends Controller
{
    //
    public function index(CityService $cityService, $province_id)
    {
        return $cityService->getCityByProvinceId($province_id);
    }
}
