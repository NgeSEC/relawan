<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    protected $table = 'time_zones';
    protected $fillable = [
        'code', 'name', 'minute',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function addTimeZone($data)
    {
        try {
            $this->code = $data->code;
            $this->name = $data->name;
            $this->minute = $data->minute;
            $this->user_id = $data->user_id;
            $this->save();
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function getTimeZoneByName($name)
    {
        return $this->where('name', $name)->get();
    }

    public function getOneTimeZoneByName($name)
    {
        return $this->where('name', '=', $name)->firstOrFail();
    }

    public function getAllTimeZone()
    {
        return $this->get();
    }

    public function getTimeZoneById($id)
    {
        return $this->findOrFail($id);
    }
}
