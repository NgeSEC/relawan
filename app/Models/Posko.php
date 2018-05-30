<?php

namespace App\Models;

use Auth;

class Posko extends Content
{
    private $objContentGeometry;
    private $objContentGeometryCoordinate;
    private $objTimezone;

    public function __construct(){
        $this->objContentGeometry = new ContentGeometry;
        $this->objContentGeometryCoordinate = new ContentGeometryCoordinate;
        $this->objTimezone = new Timezone;
    }

    public function addGeomtery(){

    }

    public function addGeometryCoordinate(){

    }

    public function addBulkPosko($dataPosko)
    {
        $listPosko = $dataPosko['features'];
        $timezone = $this->objTimezone->getOneTimeZoneByName(session('timezone'));
        for ($i = 0; $i < count($listPosko); $i++) {
            $code  = str_replace(' ','-',strtolower($listPosko[$i]['properties']['Name']));
            $keyword  = str_replace(' ',',',strtolower($listPosko[$i]['properties']['Name']));
            $objContent = new Content;
            $content = $this->getContentByCode($code);
            $poskoProperties = $listPosko[$i]['properties'];
            $poskoGeometry = $listPosko[$i]['geometry'];
            $poskoCoordinate = $listPosko[$i]['geometry']['coordinates'];
            
            if($content==null){
                $objNewContent = new \StdClass;
                $objNewContent->title = $poskoProperties['Name'];
                $objNewContent->code = $code;
                $objNewContent->description = $poskoProperties['description'];
                $objNewContent->keyword = $keyword;
                $objNewContent->og_title = $poskoProperties['Name'];
                $objNewContent->og_description = $poskoProperties['description'];
                $objNewContent->default_image = '1';
                $objNewContent->status_id = '2';
                $objNewContent->language_id = '1';
                $objNewContent->publish_date = date_format_to_utc();
                $objNewContent->additional_info = json_encode($listPosko[$i]);
                $objNewContent->content = '';
                $objNewContent->time_zone_id = $timezone->id;
                $objNewContent->owner_id = Auth::id();
                $objNewContent->user_id = Auth::id();

                $content = $this->addContent($objNewContent);
            }else{
                $content->title = $poskoProperties['Name'];
                $content->code = $code;
                $content->description = $poskoProperties['description'];
                $content->keyword = $keyword;
                $content->og_title = $poskoProperties['Name'];
                $content->og_description = $poskoProperties['description'];
                $content->default_image = '1';
                $content->status_id = '2';
                $content->language_id = '1';
                $content->publish_date = date_format_to_utc();
                $content->additional_info = json_encode($listPosko[$i]);
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

            $poskoGeometry['content_id'] = $content->id;
           
            $poskoGeometry = $this->objContentGeometry->addContentGeometry((Object)$poskoGeometry);
            
            $poskoCoordinate['geometry_id'] = $poskoGeometry->id;
            $this->objContentGeometryCoordinate->addGeometryCoordinate($poskoCoordinate);

        }
    }

    // public function contentGeometry(){
    //     $this->hasMany('App\Models\content_geometries','content_id','id');
    // }
}
