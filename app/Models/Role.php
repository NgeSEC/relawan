<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = ['id', 'name'];
    protected $hidden = ['user_id', 'created_at', 'updated_ate'];

    public function getRoleByName($name){
        return $this->where('name', $name)->get();
    }

    public function addRole($request){
        try{
            $this->name = $request->name;
            $this->user_id = $request->user_id;
            $this->save();
            return true;
        }catch(\Exception $e){
            report($e);
            return false;
        }
    }
}
