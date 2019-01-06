<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 01:40
 */

namespace App\Services;


use App\Models\Place;
use App\Repositories\PlaceRepository;

/**
 * Class PlaceService
 * @package App\Services
 */
class PlaceService
{
    private $placeRepository;
    private $place;
    
    public function __construct()
    {
        $this->placeRepository = new PlaceRepository();
        $this->place = new Place();
    }
    
    /**
     * @param $search
     * @return mixed
     */
    public function getListPosko($search)
    {
        return $this->placeRepository->getSearchPaginate('2', $this->place, 15, $search);
    }
    
    /**
     * @return \WebAppId\Content\Models\Content
     */
    public function getAllPosko(){
        return $this->placeRepository->getAllPlace();
    }
    
    /**
     * @param null $type
     * @param null $paginate
     * @return mixed
     */
    public function getList($type = null, $paginate = null)
    {
        return $this->placeRepository->getList($type, $paginate);
    }
    
    /**
     * @param $code
     * @return mixed
     */
    public function getPlaceByCode($code)
    {
        return $this->placeRepository->getPlaceByCode($code);
    }
}