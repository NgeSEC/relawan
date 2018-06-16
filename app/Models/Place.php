<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class Place extends Content
{
    private $objContentGeometry;
    private $objContentGeometryCoordinate;
    private $objTimezone;

    public function __construct()
    {
        $this->objContentGeometry = new ContentGeometry;
        $this->objContentGeometryCoordinate = new ContentGeometryCoordinate;
        $this->objTimezone = new TimeZone;
    }

    public function addPlace($placeProperties, $code, $keyword, $listPlace, $timezone, $owner_id, $user_id)
    {
        $objNewContent = new \StdClass;
        $objNewContent->title = $placeProperties['Name'];
        $objNewContent->code = $code;
        $objNewContent->description = $placeProperties['description'];
        $objNewContent->keyword = $keyword;
        $objNewContent->og_title = $placeProperties['Name'];
        $objNewContent->og_description = $placeProperties['description'];
        $objNewContent->default_image = '1';
        $objNewContent->status_id = '2';
        $objNewContent->language_id = '1';
        $objNewContent->publish_date = date_format_to_utc();
        $objNewContent->additional_info = $listPlace;
        $objNewContent->content = '';
        $objNewContent->time_zone_id = $timezone->id;
        $objNewContent->owner_id = $owner_id;
        $objNewContent->user_id = $user_id;
        
        return $this->addContent($objNewContent);
    }

    public function updatePlace($content, $placeProperties, $code, $keyword, $listPlace, $timezone, $owner_id, $user_id){
        try {
            $content->title = $placeProperties['Name'];
            $content->code = $code;
            $content->description = $placeProperties['description'];
            $content->keyword = $keyword;
            $content->og_title = $placeProperties['Name'];
            $content->og_description = $placeProperties['description'];
            $content->default_image = '1';
            $content->status_id = '2';
            $content->language_id = '1';
            $content->publish_date = date_format_to_utc();
            $content->additional_info = $listPlace;
            $content->content = '';
            $content->time_zone_id = $timezone->id;
            $content->owner_id = $owner_id;
            $content->user_id = $user_id;
            $content->save();
            return true;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    public function addBulkPlace($dataPlace, $user_id, $owner_id, $timezone)
    {
        
        $result = true;
        $listPlace = $dataPlace['features'];
        $timezone = $this->objTimezone->getOneTimeZoneByName($timezone);
        for ($i = 0; $i < count($listPlace); $i++) {
            $code = str_replace(' ', '-', strtolower($listPlace[$i]['properties']['Name']));
            $keyword = str_replace(' ', ',', strtolower($listPlace[$i]['properties']['Name']));
            $objContent = new Content;
            $content = $this->getContentByCode($code);
            $placeProperties = $listPlace[$i]['properties'];
            $placeGeometry = $listPlace[$i]['geometry'];
            $placeCoordinate = $listPlace[$i]['geometry']['coordinates'];

            if ($content == null) {
                $content = $this->addPlace($placeProperties, $code, $keyword, json_encode($listPlace[$i]), $timezone, $owner_id, $user_id);
                if (!$content) {
                    return false;
                }
            } else {
                $result = $this->updatePlace($content, $placeProperties, $code, $keyword, json_encode($listPlace[$i]), $timezone, $owner_id, $user_id);
                if(!$result){
                    return false;
                }
            }

            $contentGeometry = $this->objContentGeometry->getContentGeometryByContentId($content->id);

            if (count($contentGeometry) > 0) {
                $this->objContentGeometryCoordinate->deleteGeometryCoordinateByGeometryId($contentGeometry[0]->id);
            }
            $this->objContentGeometry->deleteContentGeometryByContentId($content->id);

            $placeGeometry['content_id'] = $content->id;
            $placeGeometry['user_id'] = $user_id;

            $placeGeometry = $this->objContentGeometry->addContentGeometry((Object) $placeGeometry);
            if (!$placeGeometry) {
                return false;
            } else {
                $placeCoordinate['geometry_id'] = $placeGeometry->id;
                $placeCoordinate['user_id'] = $user_id;
                $geometryCoordinate = $this->objContentGeometryCoordinate->addGeometryCoordinate($placeCoordinate);
                if (!$geometryCoordinate) {
                    return false;
                }
            }

        }
        return $content;
    }

    public function getPlaceById($id)
    {
        return $this->find($id);
    }

    public function getAllPlace()
    {
        return $this->get();
    }

    public function contentGeometry()
    {
        return $this->hasMany('App\Models\ContentGeometry', 'content_id', 'id');
    }
}
