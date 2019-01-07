<?php
/**
 * Created by PhpStorm.
 * User: banumelody
 * Date: 17/06/18
 * Time: 00.46
 */

namespace App\Http\Controllers;

use App\Services\PlaceService;

class PoskoController extends Controller
{
    private $placeService;
    
    public function __construct()
    {
        $this->placeService = new PlaceService();
    }
    
    public function index()
    {
        $poskos = $this->placeService->getAllPosko();
        
        if(count($poskos)>0) {
    
            $result = new \StdClass();
            $result->type = 'FeatureCollection';
            
            $crsGroup = new \StdClass();
            $crsGroup->type = 'name';
            
            $crsPropertiesGroup = new \StdClass();
            $crsPropertiesGroup->name = 'urn:ogc:def:crs:OGC:1.3:CRS84';
            $crsGroup->properties = $crsPropertiesGroup;
            
            $result->crs = $crsGroup;
            
            $featuresList = [];
            
            for ($i = 0; $i < count($poskos); $i++) {
                $featureItem = new \StdClass();
                $featureItem->type = 'Feature';
                
                $featureItemProperties = new \StdClass();
                $featureItemProperties->Name = $poskos[$i]->title;
                $featureItemProperties->description = $poskos[$i]->content;
                $featureItemProperties->timestamp = null;
                $featureItemProperties->begin = null;
                $featureItemProperties->end = null;
                $featureItemProperties->altitudeMode = null;
                $featureItemProperties->tessellate = -1;
                $featureItemProperties->extrude = 0;
                $featureItemProperties->visibility = -1;
                $featureItemProperties->drawOrder = null;
                $featureItemProperties->gx_media_links = null;
                $featureItem->properties = $featureItemProperties;
                
                
                $featureItemGeometry = new \StdClass();
                $featureItemGeometry->type = $poskos[$i]->contentGeometry[0]->type;
                
                $featureItemGeometryCoordinate = [];
                $featureItemGeometryCoordinate[] = $poskos[$i]->contentGeometry[0]->coordinate[0]->longitude;
                $featureItemGeometryCoordinate[] = $poskos[$i]->contentGeometry[0]->coordinate[0]->latitude;
                $featureItemGeometry->coordinates = $featureItemGeometryCoordinate;
                $featureItem->geometry = $featureItemGeometry;
    
                $featuresList[] = $featureItem;
            }
    
            $result->features = $featuresList;
        }
        
        return (Array)$result;
    }
}