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

/**
 * Class ContentGeometryCoordinateRepository
 * @package App\Repositories
 */
class ContentGeometryCoordinateRepository
{
    
    /**
     * @param ContentGeometryCoordinate $contentGeometryCoordinate
     * @param $geometryId
     * @return mixed
     */
    public function getGeometryCoordinateByGeometryId(ContentGeometryCoordinate $contentGeometryCoordinate, $geometryId)
    {
        return $contentGeometryCoordinate->where('geometry_id', $geometryId)->get();
    }
    
    /**
     * @param ContentGeometryCoordinate $contentGeometryCoordinate
     * @param $geometryId
     */
    public function deleteGeometryCoordinateByGeometryId(ContentGeometryCoordinate $contentGeometryCoordinate, $geometryId)
    {
        $geometryCoordinate = $this->getGeometryCoordinateByGeometryId($contentGeometryCoordinate, $geometryId);
        if (count($geometryCoordinate) > 0) {
            for ($i = 0; $i < count($geometryCoordinate); $i++) {
                $geometryCoordinate[$i]->delete();
            }
        }
    }
    
    /**
     * @param ContentGeometryCoordinate $contentGeometryCoordinate
     * @param $data
     * @return ContentGeometryCoordinate|null
     */
    public function addGeometryCoordinate(ContentGeometryCoordinate $contentGeometryCoordinate, $data)
    {
        try {
            $contentGeometryCoordinate->geometry_id = $data['geometry_id'];
            $contentGeometryCoordinate->longitude = $data[0];
            $contentGeometryCoordinate->latitude = $data[1];
            $contentGeometryCoordinate->user_id = $data['user_id'];
            $contentGeometryCoordinate->save();
            
            return $contentGeometryCoordinate;
        } catch (QueryException $e) {
            report($e);
            return null;
        }
        
    }
}