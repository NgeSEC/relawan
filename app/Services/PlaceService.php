<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 01:40
 */

namespace App\Services;


use App\Models\PlaceRepository;
use WebAppId\Content\Models\Content;

/**
 * Class PlaceService
 * @package App\Services
 */
class PlaceService
{
    private $placeRepository;
    private $content;
    
    public function __construct()
    {
        $this->placeRepository = new PlaceRepository();
        $this->content = new Content();
    }
    
    /**
     * @param $search
     * @return mixed
     */
    public function getListPosko($search)
    {
        return $this->placeRepository->getSearchPaginate('2', $this->content, 15, $search);
    }
}