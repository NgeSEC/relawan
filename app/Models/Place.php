<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 00:25
 */

namespace App\Models;


use WebAppId\Content\Models\Content;

class Place extends Content
{
    public function contentGeometry()
    {
        return $this->hasMany(ContentGeometry::class, 'content_id', 'id');
    }
    
    public function type()
    {
        return $this->belongsToMany(PlaceType::class, 'place_type_contents', 'content_id', 'content_type_id');
    }
}