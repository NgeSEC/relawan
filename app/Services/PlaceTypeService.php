<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 12:34
 */

namespace App\Services;


use App\Models\PlaceType;
use App\Repositories\PlaceTypeRepository;

/**
 * Class PlaceTypeService
 * @package App\Services
 */
class PlaceTypeService
{
    private $placeTypeRepository;
    
    public function __construct()
    {
        $this->placeTypeRepository = new PlaceTypeRepository();
    }
    
    /**
     * @param $request
     * @return PlaceType|null
     */
    public function addPlaceType($request)
    {
        return $this->placeTypeRepository->addPoskoType($request, new PlaceType());
    }
    
    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->placeTypeRepository->getAll(new PlaceType());
    }
}