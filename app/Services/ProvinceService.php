<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 02:12
 */

namespace App\Services;


use App\Repositories\ProvinceRepository;

class ProvinceService
{
    private $provinceRepository;
    public function __construct()
    {
        $this->provinceRepository = new ProvinceRepository();
    }
    
    /**
     * @return mixed
     */
    public function getProvinceOrderByName(){
        return $this->provinceRepository->getProvinceOrderByName();
    }
}