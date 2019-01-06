<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 01:11
 */

namespace App\Repositories;


use Laravolt\Indonesia\Models\Province;

class ProvinceRepository
{
    private $province;
    
    public function __construct()
    {
        $this->province = new Province();
    }
    
    /**
     * @return mixed
     */
    public function getProvinceOrderByName(){
        return $this->province
            ->orderBy('name')
            ->get();
    }
}