<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table='files';

    protected $hidden=['created_at','updated_at'];

    protected $fillable=['id','name','description','alt','mime_type_id', 'owner_id','user_id'];

    public function addFile($request){
        try{
            $this->name = $request->name;
            $this->description = $request->description;
            $this->alt = $request->alt;
            $this->path = $request->path;
            $this->mime_type_id = $request->mime_type_id;
            $this->owner_id = $request->owner_id;
            $this->user_id = $request->user_id;
            $this->save();
            return $this;
        }catch(\Exception $e){
            report($e);
            return false;
        }
    }

    public function getOne($id){
        return $this->findOrFail($id);
    }

    public function getFileByName($name){
        return $this->where('name',$name)->get();
    }

    public function mime(){
        return $this->belongsTo('Loketics\Models\MimeType');
    }

    public function content(){
        return $this->belongsTo('Loketics\Models\Content');
    }

    public function getFileCount(){
        return $this->count();
    }
}
