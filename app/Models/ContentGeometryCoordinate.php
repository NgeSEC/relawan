<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Auth;

class ContentGeometryCoordinate extends Model
{
    //
    protected $table = 'content_geometry_coordinates';
    protected $fillable = ['id', 'geometry_id', 'longitude', 'latitude'];
    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    public function contentGeometry(){
        return $this->belongsTo('App\Models\ContentGeometry','geometry_id','id');
    }

    public function getGeometryCoordinateByGeometryId($geometryId){
        return $this->where('geometry_id', $geometryId)->get();
    }

    public function deleteGeometryCoordinateByGeometryId($geometryId){
        $geometryCoordinate = $this->getGeometryCoordinateByGeometryId($geometryId);
        if(count($geometryCoordinate)>0){
            for ($i=0; $i < count($geometryCoordinate); $i++) { 
                $geometryCoordinate[$i]->delete();
            }  
        }
    }

    public function addGeometryCoordinate($data){
        try{
            $result              = new self();
            $result->geometry_id = $data['geometry_id'];
            $result->longitude   = $data[0];
            $result->latitude    = $data[1];
            $result->user_id     = $data['user_id'];
            $result->save();

            return $result;
        }catch(QueryException $e){
            report($e);
            return false;
        }

    }
}
