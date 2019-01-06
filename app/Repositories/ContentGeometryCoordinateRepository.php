<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 00:37
 */

namespace App\Repositories;


use App\Models\ContentGeometryCoordinate;
use Illuminate\Database\QueryException;

class ContentGeometryCoordinateRepository
{
    
    private $contentGeometryCoordinate;
    
    public function __construct()
    {
        $this->contentGeometryCoordinate = new ContentGeometryCoordinate();
    }
    
    public function getGeometryCoordinateByGeometryId($geometryId)
    {
        return $this->contentGeometryCoordinate->where('geometry_id', $geometryId)->get();
    }
    
    public function deleteGeometryCoordinateByGeometryId($geometryId)
    {
        $geometryCoordinate = $this->getGeometryCoordinateByGeometryId($geometryId);
        if (count($geometryCoordinate) > 0) {
            for ($i = 0; $i < count($geometryCoordinate); $i++) {
                $geometryCoordinate[$i]->delete();
            }
        }
    }
    
    public function addGeometryCoordinate($data)
    {
        try {
            $result = new ContentGeometryCoordinate();
            $result->geometry_id = $data['geometry_id'];
            $result->longitude = $data[0];
            $result->latitude = $data[1];
            $result->user_id = $data['user_id'];
            $result->save();
            
            return $result;
        } catch (QueryException $e) {
            report($e);
            return null;
        }
        
    }
}