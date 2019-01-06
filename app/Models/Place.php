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
        return $this->hasMany('App\Models\ContentGeometry', 'content_id', 'id');
    }
    
}