<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Content extends Model
{
    //
    protected $table = 'contents';

    protected $hidden = ['created_at', 'updated_at', 'owner_id', 'user_id'];

    protected $fillable = ['id', 'code', 'title', 'description', 'keyword', 'og_title', 'og_description', 'default_image', ' status_id', 'language_id', 'publish_date', 'additional_info', 'content'];

    /**
     * Method To Add Data Content
     *
     * @param Request $data
     * @return Boolean true/false
     */
    public function addContent($data)
    {
        try {
            $this->title = $data->title;
            $this->code = $data->code;
            $this->description = $data->description;
            $this->keyword = $data->keyword;
            $this->og_title = $data->og_title;
            $this->og_description = $data->og_description;
            $this->default_image = $data->default_image;
            $this->status_id = $data->status_id;
            $this->language_id = $data->language_id;
            $this->publish_date = $data->publish_date;
            $this->additional_info = $data->additional_info;
            $this->content = $data->content;
            $this->time_zone_id = $data->time_zone_id;
            $this->owner_id = $data->owner_id;
            $this->user_id = $data->user_id;
            $this->save();
            return $this;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    public function updateContentByCode($request, $code)
    {
        $result = $this->getContentByCode($code);
        if ($result != null) {
            try {
                $result->title = $request->title;
                $result->code = $request->code;
                $result->description = $request->description;
                $result->keyword = $request->keyword;
                $result->og_title = $request->og_title;
                $result->og_description = $request->og_description;
                $result->default_image = $request->default_image;
                $result->status_id = $request->status_id;
                $result->language_id = $request->language_id;
                $result->publish_date = $request->publish_date;
                $result->additional_info = $request->additional_info;
                $result->content = $request->content;
                $result->time_zone_id = $request->time_zone_id;
                $result->owner_id = $request->owner_id;
                $result->user_id = $request->user_id;
                $result->save();
                return true;
            } catch (QueryException $e) {
                report($e);
                return false;
            }
        } else {
            return false;
        }
    }

    public function getContentByCode($code)
    {
        return $this->where('code', $code)->first();
    }
}
