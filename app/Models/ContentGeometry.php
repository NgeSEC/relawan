<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentGeometry extends Model
{
    //
    protected $table = 'content_geometries';

    protected $fillable = ['id', 'content_id', 'type'];

    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    public function ContentGeometryCoordinate()
    {
        return $this->hasMany('App\Models\ContentGeometryCoordinate', 'geometry_id', 'id');
    }

    public function place()
    {
        return $this->belongsTo('App\Models\Content', 'content_id', 'id');
    }
}
