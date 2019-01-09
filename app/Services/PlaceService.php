<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 01:40
 */

namespace App\Services;


use App\Libs\Tools;
use App\Models\ContentGeometry;
use App\Models\ContentGeometryCoordinate;
use App\Models\Place;
use App\Repositories\ContentGeometryCoordinateRepository;
use App\Repositories\ContentGeometryRepository;
use App\Repositories\PlaceRepository;
use Illuminate\Support\Facades\Auth;
use WebAppId\Content\Models\TimeZone;
use WebAppId\Content\Repositories\TimeZoneRepository;

/**
 * Class PlaceService
 * @package App\Services
 */
class PlaceService
{
    private $placeRepository;
    private $timeZoneRepository;
    private $contentGeometryRepository;
    private $contentGeometryCoordinateRepository;
    
    public function __construct()
    {
        $this->placeRepository = new PlaceRepository();
        $this->timeZoneRepository = new TimeZoneRepository();
        $this->contentGeometryCoordinateRepository = new ContentGeometryCoordinateRepository();
        $this->contentGeometryRepository = new ContentGeometryRepository();
    }
    
    /**
     * @param $search
     * @return mixed
     */
    public function getListPosko($search)
    {
        return $this->placeRepository->getSearchPaginate('2', new Place(), 15, $search);
    }
    
    /**
     * @return \WebAppId\Content\Models\Content
     */
    public function getAllPosko()
    {
        return $this->placeRepository->getAllPlace();
    }
    
    /**
     * @return array
     */
    public function getPoskoLeaflet()
    {
        $poskos = $this->getAllPosko();
        if (count($poskos) > 0) {
            
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
    
    /**
     * @param null $type
     * @param null $paginate
     * @return mixed
     */
    public function getList($type = null, $paginate = null)
    {
        return $this->placeRepository->getList($type, $paginate);
    }
    
    /**
     * @param $code
     * @return mixed
     */
    public function getPlaceByCode($code)
    {
        return $this->placeRepository->getPlaceByCode($code);
    }
    
    /**
     * @param $req
     * @return mixed
     */
    private function transform($req)
    {
        $posko['features'][0]['type'] = "Feature";
        $posko['features'][0]['properties'] = [
            "Name" => $req["name"],
            "description" => $req["desc"],
            "capacity" => $req["capacity"],
            "timestamp" => null,
            "begin" => null,
            "end" => null,
            "altitudeMode" => null,
            "tessellate" => -1,
            "extrude" => 0,
            "visibility" => -1,
            "drawOrder" => null,
            "icon" => null,
            "address" => $req["address"],
            "province" => $req["province"],
            "regency" => $req["regency"],
            "district" => $req["district"],
            "village" => $req["district"],
            "kind" => $req["kind"],
            "pic" => $req["pic"],
            "phone" => $req["phone"]
        ];
        $posko['features'][0]['geometry'] = [
            "type" => "Point",
            "coordinates" => [
                $req["lat"],
                $req["long"],
                0.0
            ]
        ];
        
        return $posko;
    }
    
    /**
     * @param $request
     * @return mixed|null
     */
    public function addPosko($request)
    {
        
        $posko = $this->transform($request);
        
        $owner_id = Auth::id();
        $user_id = Auth::id();
        
        $timezone = 'Asia/Jakarta';
        
        return $this->addBulkPlace($posko, $user_id, $owner_id, $timezone);
    }
    
    /**
     * @param $content
     * @param $placeProperties
     * @param $code
     * @param $keyword
     * @param $oriData
     * @param $timezone
     * @param $owner_id
     * @param $user_id
     * @return bool|\WebAppId\Content\Models\Content
     */
    private function savePlace($content, $placeProperties, $code, $keyword, $oriData, $timezone, $owner_id, $user_id)
    {
        if ($content == null) {
            $content = $this->placeRepository->addPlace($placeProperties, $code, $keyword, json_encode($oriData), $timezone, $owner_id, $user_id);
            if (!$content) {
                return false;
            }
        } else {
            $content = $this->placeRepository->updatePlace($content, $placeProperties, $code, $keyword, json_encode($oriData), $timezone, $owner_id, $user_id);
            if (!$content) {
                return false;
            }
        }
        
        return $content;
    }
    
    /**
     * @param $placeGeometry
     * @param $placeCoordinate
     * @param $user_id
     * @param $content
     * @return bool
     */
    private function saveContentGeometry($placeGeometry, $placeCoordinate, $user_id, $content)
    {
        $contentGeometry = new ContentGeometry();
        $contentGeometryCoordinate = new ContentGeometryCoordinate();
        $resultContentGeometry = $this->contentGeometryRepository->getContentGeometryByContentId($contentGeometry, $content->id);
        
        if (count($resultContentGeometry) > 0) {
            $this->contentGeometryCoordinateRepository->deleteGeometryCoordinateByGeometryId($contentGeometryCoordinate, $resultContentGeometry[0]->id);
        }
        $this->contentGeometryRepository->deleteContentGeometryByContentId($contentGeometry, $content->id);
        
        $placeGeometry['content_id'] = $content->id;
        $placeGeometry['user_id'] = $user_id;
        
        $placeGeometry = $this->contentGeometryRepository->addContentGeometry($contentGeometry, (Object)$placeGeometry);
        if (!$placeGeometry) {
            return false;
        } else {
            $placeCoordinate['geometry_id'] = $placeGeometry->id;
            $placeCoordinate['user_id'] = $user_id;
            $geometryCoordinate = $this->contentGeometryCoordinateRepository->addGeometryCoordinate($contentGeometryCoordinate, $placeCoordinate);
            if (!$geometryCoordinate) {
                return false;
            }
            return true;
        }
    }
    
    /**
     * @param $dataPlace
     * @param $user_id
     * @param $owner_id
     * @param $timezone
     * @return mixed|null
     */
    public function addBulkPlace($dataPlace, $user_id, $owner_id, $timezone)
    {
        $content = null;
        $listPlace = $dataPlace['features'];
        $timezone = $this->timeZoneRepository->getOneTimeZoneByName($timezone, new TimeZone());
        
        for ($i = 0; $i < count($listPlace); $i++) {
            $code = str_replace(' ', '-',
                Tools::clean(strtolower($listPlace[$i]['properties']['Name'])));
            $keyword = str_replace(' ', ',',
                Tools::clean(strtolower($listPlace[$i]['properties']['Name'])));
            
            $content = $this->placeRepository->getContentByCode($code, new Place());
            $placeProperties = $listPlace[$i]['properties'];
            $placeGeometry = $listPlace[$i]['geometry'];
            $placeCoordinate = $listPlace[$i]['geometry']['coordinates'];
    
            $content = $this->savePlace($content, $placeProperties, $code, $keyword, $listPlace[$i], $timezone, $owner_id, $user_id);
            
            $this->saveContentGeometry($placeGeometry, $placeCoordinate, $user_id, $content);
    
        }
        
        return $content;
    }
    
    /**
     * @param $contentId
     * @return mixed
     */
    public function getContentById($contentId)
    {
        return $this->placeRepository->getPlaceById($contentId);
    }
}