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
            $content = $this->getContentByCode($code);
            $poskoProperties = $listPosko[$i]['properties'];
            $poskoGeometry = $listPosko[$i]['geometry'];
            $poskoCoordinate = $listPosko[$i]['geometry']['coordinates'];

            if(count($content)==0){
                $objContent = new \StdClass;
                $objContent->title = $poskoProperties['Name'];
                $objContent->code = $code;
                $objContent->description = $poskoProperties['description'];
                $objContent->keyword = $keyword;
                $objContent->og_title = $poskoProperties['Name'];
                $objContent->og_description = $poskoProperties['description'];
                $objContent->default_image = '1';
                $objContent->status_id = '2';
                $objContent->language_id = '1';
                $objContent->publish_date = date_format_to_utc();
                $objContent->additional_info = json_encode($listPosko[$i]);
                $objContent->content = '';
                $objContent->time_zone_id = $timezone->id;
                $objContent->owner_id = Auth::id();
                $objContent->user_id = Auth::id();

                $content = $this->addContent($objContent);
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
                $this->objContentGeometryCoordinate->deleteGeometryCoordinateByGeometryId($contentGeometry->id);
            }
            $this->objContentGeometry->deleteContentGeometryByContentId($content->id);

            $poskoGeometry['content_id'] = $content->id;
           
            $poskoGeometry = $this->objContentGeometry->addContentGeometry((Object)$poskoGeometry);
            
            $poskoCoordinate['geometry_id'] = $poskoGeometry->id;
            $this->objContentGeometryCoordinate->addGeometryCoordinate($poskoCoordinate);

        }
    }

    public function contentGeometry(){
        $this->hasMany('App\Models\content_geometries','content_id','id');
    }
}
