<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 01:40
 */

namespace App\Services;


use App\Repositories\PlaceRepository;
use Illuminate\Support\Facades\Auth;
use WebAppId\Content\Models\Content;
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
    
    public function __construct()
    {
        $this->placeRepository = new PlaceRepository();
        $this->timeZoneRepository = new TimeZoneRepository();
    }
    
    /**
     * @param $search
     * @return mixed
     */
    public function getListPosko($search)
    {
        return $this->placeRepository->getSearchPaginate('2', $this->place, 15, $search);
    }
    
    /**
     * @return \WebAppId\Content\Models\Content
     */
    public function getAllPosko(){
        return $this->placeRepository->getAllPlace();
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
    
    private function transform($req){
        $posko['type'] = "Feature";
        $posko['properties'] = [
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
        $posko['geometry'] = [
            "type" => "Point",
            "coordinates" => [
                $req["lat"],
                $req["long"],
                0.0
            ]
        ];
        
        return $posko;
    }
    
    public function addPosko($request){
    
        $posko = $this->transform($request);
    
        $owner_id = Auth::id();
        $user_id = Auth::id();
    
        $timezone = $this->timeZoneRepository->getOneTimeZoneByName('Asia/Jakarta', new TimeZone());
        $code = str_replace(' ', '-', strtolower($posko['properties']['Name']));
        $keyword = str_replace(' ', ',', strtolower($posko['properties']['Name']));
        $content = $this->placeRepository->getContentByCode($code, new Content());
        $placeProperties = $posko['properties'];
        $placeGeometry = $posko['geometry'];
        $placeCoordinate = $posko['geometry']['coordinates'];
    
        if ($content == null) {
            $content = $this->placeRepository->addPlace($placeProperties, $code, $keyword, json_encode($posko), $timezone, $owner_id, $user_id);
            if (!$content) {
                return false;
            }
        } else {
            $result = $this->placeRepository->updatePlace($content, $placeProperties, $code, $keyword, json_encode($posko), $timezone, $owner_id, $user_id);
            if (!$result) {
                return false;
            }
        }
    
        $contentGeometry = $this->contentGeometry->getContentGeometryByContentId($content->id);
    
        if (count($contentGeometry) > 0) {
            $this->contentGeometryCoordinate->deleteGeometryCoordinateByGeometryId($contentGeometry[0]->id);
        }
        $this->contentGeometry->deleteContentGeometryByContentId($content->id);
    
        $placeGeometry['content_id'] = $content->id;
        $placeGeometry['user_id'] = $user_id;
    
        $placeGeometry = $this->contentGeometry->addContentGeometry((Object)$placeGeometry);
        if (!$placeGeometry) {
            return false;
        } else {
            $placeCoordinate['geometry_id'] = $placeGeometry->id;
            $placeCoordinate['user_id'] = $user_id;
            $geometryCoordinate = $this->contentGeometryCoordinate->addGeometryCoordinate($placeCoordinate);
            if (!$geometryCoordinate) {
                return false;
            }
        }
    }
}