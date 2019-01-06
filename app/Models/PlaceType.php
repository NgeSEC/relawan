<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 12:21
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $table = 'place_types';
    
    protected $fillable = ['id', 'code', 'name'];
    
    protected $hidden = ['update_at', 'created_at'];
}