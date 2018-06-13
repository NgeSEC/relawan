<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

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
            return $this;
        }catch(QueryException $e){
            report($e);
            return false;
        }
    }
}
