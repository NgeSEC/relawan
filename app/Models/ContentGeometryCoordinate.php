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
}
