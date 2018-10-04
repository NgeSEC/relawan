<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Place;
use WebAppId\Content\Models\TimeZone;
use WebAppId\Content\Models\ContentCategory;
use App\Models\ContentGeometry;
use App\Models\ContentGeometryCoordinate;

class AdminController extends Controller
{
    private $place;
    private $timezone;
    private $contentCategory;
    private $contentGeometry;
    private $contentGeometryCoordinate;

    public function __construct()
    {
        $this->place = new Place();
        $this->timezone = new TimeZone();
        $this->contentCategory = new ContentCategory;
        $this->contentGeometry = new ContentGeometry;
        $this->contentGeometryCoordinate = new ContentGeometryCoordinate;
    }

    public function admin()
    {
        return view('admin.apps.home');
    }

    public function posko()
    {
        $poskos = DB::table('contents')->paginate(15);
        return view('admin.apps.posko', ['poskos' => $poskos]);

    }

    public function addPosko()
    {
        $provinces = DB::table('indoregion_provinces')
            ->orderBy('name')
            ->get();
        $url = action('AdminController@savePosko');
        return view('admin.apps.add-posko', ['provinces' => $provinces, 'url' => $url]);
    }

    public function savePosko(Request $request)
    {
        $req = $request->input();

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

        $owner_id = Auth::id();
        $user_id  = Auth::id();

        $timezone = $this->timezone->getOneTimeZoneByName('Asia/Jakarta');
        $code = str_replace(' ', '-', strtolower($posko['properties']['Name']));
        $keyword = str_replace(' ', ',', strtolower($posko['properties']['Name']));
        $content = $this->place->getContentByCode($code);
        $placeProperties = $posko['properties'];
        $placeGeometry = $posko['geometry'];
        $placeCoordinate = $posko['geometry']['coordinates'];

        if ($content == null) {
            $content  = $this->place->addPlace($placeProperties, $code, $keyword, json_encode($posko), $timezone, $owner_id, $user_id);
            if (!$content) {
                return false;
            }
        } else {
            $result = $this->place->updatePlace($content, $placeProperties, $code, $keyword, json_encode($posko), $timezone, $owner_id, $user_id);
            if(!$result){
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

        $placeGeometry = $this->contentGeometry->addContentGeometry((Object) $placeGeometry);
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

        $poskos = DB::table('contents')->paginate(15);
        return view('admin.apps.posko', ['poskos' => $poskos]);
    }

    public function getRegencies(Request $request)
    {
        $regencies = DB::table('indoregion_regencies')
            ->orderBy('name')
            ->where('province_id', $request->input('province_id'))
            ->get();
        return response(json_encode($regencies), 200)
            ->header('Content-Type', 'application/json');
    }

    public function getDistricts(Request $request)
    {
        $regencies = DB::table('indoregion_districts')
            ->orderBy('name')
            ->where('regency_id', $request->input('regency_id'))
            ->get();
        return response(json_encode($regencies), 200)
            ->header('Content-Type', 'application/json');
    }

    public function getVillages(Request $request)
    {
        $regencies = DB::table('indoregion_villages')
            ->orderBy('name')
            ->where('district_id', $request->input('district_id'))
            ->get();
        return response(json_encode($regencies), 200)
            ->header('Content-Type', 'application/json');
    }
}
