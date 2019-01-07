<?php

namespace App\Http\Controllers\References;

use App\Repositories\PlaceRepository;
use App\Services\PlaceService;
use App\Services\PlaceTypeService;
use App\Services\ProvinceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use WebAppId\Content\Repositories\TimeZoneRepository;


class PlaceController extends Controller
{
    
    public function __construct()
    {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param PlaceService $placeService
     * @return \Illuminate\Http\Response
     */
    public function index(PlaceService $placeService)
    {
        $poskos = $placeService->getListPosko("");
        return view('admin.apps.posko', ['poskos' => $poskos]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @param ProvinceService $provinceService
     * @param PlaceTypeService $placeTypeService
     * @return \Illuminate\Http\Response
     */
    public function create(ProvinceService $provinceService, PlaceTypeService $placeTypeService)
    {
        $poskoType = $placeTypeService->getAll();
        $provinces = $provinceService->getProvinceOrderByName();
        $url = route('admin.references.posko.index');
        
        $result['provinces'] = $provinces;
        $result['url'] = $url;
        $result['place_types'] = $poskoType;
        
        return view('admin.apps.add-posko', $result);
    }
    
    public function save(Request $request, PlaceService $placeService, TimeZone $timeZoneRepository)
    {
        
        
        $poskos = DB::table('contents')->paginate(15);
        return view('admin.apps.posko', ['poskos' => $poskos]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param PlaceRepository $placeRepository
     * @return void
     */
    public function store(Request $request, PlaceRepository $placeRepository)
    {
        //
        $user_id = Auth::id();
        $owner_id = Auth::id();
        $timezone = session('timezone');
        $placeRepository->addBulkPlace(json_decode($request['data'], true), $user_id, $owner_id, $timezone);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importGeoJson(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('file');
        if (!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        
        $file = file_get_contents($file);
        $json = json_decode($file, true);
        
        
        $place = new PlaceRepository();
        
        $addBulk = $place->addBulkPlace($json, 1, 1, 'Asia/Jakarta');
        
        
        if ($addBulk) {
            $request->session()->flash('alert-success', 'Posko geoJson was successful added!');
        } else {
            $request->session()->flash('alert-danger', 'Upload failed! :(');
        }
        
        
        return Redirect::route('admin.references.posko.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
