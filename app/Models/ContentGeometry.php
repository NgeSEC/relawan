<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class ContentGeometry extends Model
{
    //
    protected $table = 'content_geometries';

    protected $fillable = ['id', 'content_id', 'type'];

    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    public function ContentGeometryCoordinate()
    {
        return $this->hasMany('App\Models\ContentGeometryCoordinate', 'geometry_id', 'id');
    }

    public function place()
    {
        return $this->belongsTo('App\Models\Content', 'content_id', 'id');
    }

    public function getContentGeometryByContentId($contentId)
    {
        return $this->where('content_id', $contentId)->get();
    }

    public function deleteContentGeometryByContentId($contentId)
    {
        $contentGeometry = $this->getContentGeometryByContentId($contentId);
        if (count($contentGeometry) > 0) {
            for ($i = 0; $i < count($contentGeometry); $i++) {
                $contentGeometry[$i]->delete();
            }

        }
    }

    public function addContentGeometry($data)
    {
        try {
            $result             = new self();
            $result->content_id = $data->content_id;
            $result->type       = $data->type;
            $result->user_id    = $data->user_id;
            $result->save();

            return $result;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }
}
