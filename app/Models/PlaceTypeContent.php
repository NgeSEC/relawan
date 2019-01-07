<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 12:23
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PlaceTypeContent extends Model
{
    protected $table = 'place_type_contents';
    
    protected $fillable = ['id', 'content_id', 'place_type_id'];
    
    protected $hidden = ['created_at', 'updated_at'];
}