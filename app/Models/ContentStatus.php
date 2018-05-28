<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class ContentStatus extends Model
{
    protected $table = 'content_statuses';
    protected $fillable = ['id', 'name'];
    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    public function addContentStatus($request)
    {
        try {
            $this->name = $request->name;
            $this->user_id = $request->user_id;
            $this->save();
            return true;
        } catch (QueryException $e) {
            report($e);
            return false;
        }

    }

    public function getContentStatus()
    {
        return $this->get();
    }

    public function updateContentStatus($id, $request)
    {
        try {
            $result = $this->find($id);
            if (!empty($result)) {
                $result->name = $request->name;
                $result->user_id = $request->user_id;
                $result->save();
                return true;
            } else {
                return false;
            }
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    public function getContentStatusById($id)
    {
        return $this->find($id);
    }

    public function getContentStatusForPartner()
    {
        return $this
            ->whereIn('id', [1, 3, 4, 5, 6])
            ->get();
    }

    public function getContentStatusesByName($name){
        return $this->where('name', $name)->get();
    }
}
