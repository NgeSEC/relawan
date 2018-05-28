<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['id', 'code', 'name'];
    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    public function addLanguage($request)
    {
        try{
            $this->code = $request->code;
            $this->name = $request->name;
            $this->image_id = $request->image_id;
            $this->user_id = $request->user_id;
            $this->save();
            return true;
        }catch(QueryException $e){
            report($e);
            return false;
        }
    }

    public function getLanguage()
    {
        return $this->get();
    }

    public function getLanguageByName($name){
        return $this->where('name',$name)->get();
    }
}
