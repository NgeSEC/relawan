<?php

namespace App\Http\Controllers;

use App\Repositories\PlaceRepository;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use WebAppId\Content\Models\TimeZone;
use WebAppId\Content\Models\ContentCategory;
use App\Models\ContentGeometry;
use App\Models\ContentGeometryCoordinate;
use WebAppId\Content\Repositories\TimeZoneRepository;

class AdminController extends Controller
{
    private $placeRepository;
    private $timezone;
    private $contentCategory;
    private $contentGeometry;
    private $contentGeometryCoordinate;
    private $provinceRepository;
    private $timezoneRepository;
    
    public function __construct()
    {
        $this->placeRepository = new PlaceRepository();
        $this->timezone = new TimeZone();
        $this->timezoneRepository = new TimeZoneRepository();
        $this->contentCategory = new ContentCategory;
        $this->contentGeometry = new ContentGeometry;
        $this->contentGeometryCoordinate = new ContentGeometryCoordinate;
        $this->provinceRepository = new ProvinceRepository();
    }
    
    public function admin()
    {
        return view('admin.apps.home');
    }
    
    public function savePosko(Request $request)
    {
    
    }
    
    public function editPosko($id)
    {
        // $editPosko= Province::findOrFail($id);
        $editPosko = DB::table('contents')->find($id);
        $provinces = DB::table('indoregion_provinces')
            ->orderBy('name')
            ->get();
        // dd('aaa');
        // dd($editPosko);
        return view('admin.apps.edit', compact('editPosko', 'provinces'));
    }
    
    public function updatePosko(Request $request, $id)
    {
        // $editPosko = DB::table('contents')->find($id);
        // $editPosko->title = $request->name;
        // $editPosko->description = $request->desc;
        // $editPosko->update();
        DB::table('contents')->where('id', $id)
            ->update(['title' => $request->name,
                'description' => $request->desc]);
        //tambah untuk kapasitas, jenisposko, dll nanti kalo fieldnya udah ada
        return redirect()->route('homePosko');
    }
}
