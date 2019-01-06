<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 12:29
 */

namespace App\Repositories;


use App\Models\PlaceType;
use Illuminate\Database\QueryException;

/**
 * Class PlaceTypeRepository
 * @package App\Repositories
 */
class PlaceTypeRepository
{
    /**
     * @param $request
     * @param PlaceType $placeType
     * @return PlaceType|null
     */
    public function addPoskoType($request, PlaceType $placeType)
    {
        try {
            $placeType->name = $request->name;
            $placeType->code = $request->code;
            $placeType->save();
            return $placeType;
        } catch (QueryException $queryException) {
            report($queryException);
            return null;
        }
    }
    
    /**
     * @param PlaceType $placeType
     * @return mixed
     */
    public function getAll(PlaceType $placeType)
    {
        return $placeType->get();
    }
    
    public function getPlaceByCode($code, PlaceType $placeType)
    {
        return $placeType->where('code', $code)->get();
    }
}