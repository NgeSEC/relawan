<?php

namespace App\Models;

use Auth;

class Place extends Content
{
    private $objContentGeometry;
    private $objContentGeometryCoordinate;
    private $objTimezone;

    public function __construct(){
        $this->objContentGeometry = new ContentGeometry;
        $this->objContentGeometryCoordinate = new ContentGeometryCoordinate;
        $this->objTimezone = new TimeZone;
    }

    public function addBulkPlace($dataPlace)
    {
        $listPlace = $dataPlace['features'];
        $timezone = $this->objTimezone->getOneTimeZoneByName(session('timezone'));
        for ($i = 0; $i < count($listPlace); $i++) {
            $code  = str_replace(' ','-',strtolower($listPlace[$i]['properties']['Name']));
            $keyword  = str_replace(' ',',',strtolower($listPlace[$i]['properties']['Name']));
            $objContent = new Content;
            $content = $this->getContentByCode($code);
            $placeProperties = $listPlace[$i]['properties'];
            $placeGeometry = $listPlace[$i]['geometry'];
            $placeCoordinate = $listPlace[$i]['geometry']['coordinates'];
            
            if($content==null){
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
                $objNewContent->additional_info = json_encode($listPlace[$i]);
                $objNewContent->content = '';
                $objNewContent->time_zone_id = $timezone->id;
                $objNewContent->owner_id = Auth::id();
                $objNewContent->user_id = Auth::id();

                $content = $this->addContent($objNewContent);
            }else{
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
                $content->additional_info = json_encode($listPlace[$i]);
                $content->content = '';
                $content->time_zone_id = $timezone->id;
                $content->owner_id = Auth::id();
                $content->user_id = Auth::id();
                $content->save();
            }
            
            $contentGeometry = $this->objContentGeometry->getContentGeometryByContentId($content->id);

            if(count($contentGeometry)>0){
                $this->objContentGeometryCoordinate->deleteGeometryCoordinateByGeometryId($contentGeometry[0]->id);
            }
            $this->objContentGeometry->deleteContentGeometryByContentId($content->id);

            $placeGeometry['content_id'] = $content->id;
           
            $placeGeometry = $this->objContentGeometry->addContentGeometry((Object)$placeGeometry);
            
            $placeCoordinate['geometry_id'] = $placeGeometry->id;
            $this->objContentGeometryCoordinate->addGeometryCoordinate($placeCoordinate);

        }
    }

    public function getAllPlace(){
        return $this->get();
    }

    public function contentGeometry(){
        $this->hasMany('App\Models\content_geometries','content_id','id');
    }
}
