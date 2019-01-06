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
    
    public function getAllPosko(){
        return $this->placeRepository->getAllPlace($this->place, '2');
    }
}