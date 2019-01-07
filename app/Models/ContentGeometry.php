<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentGeometry extends Model
{
    //
    protected $table = 'content_geometries';
    
    protected $fillable = ['id', 'content_id', 'type'];
    
    protected $hidden = ['user_id', 'created_at', 'updated_at'];
    
    public function coordinate()
    {
        return $this->hasMany(ContentGeometryCoordinate::class, 'geometry_id', 'id');
    }
    
    public function place()
    {
        return $this->belongsTo(Place::class, 'content_id', 'id');
    }
}
