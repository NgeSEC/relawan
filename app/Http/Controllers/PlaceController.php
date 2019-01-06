<?php
/**
 * Created by PhpStorm.
 * User: banumelody
 * Date: 17/06/18
 * Time: 00.46
 */

namespace App\Http\Controllers;

use App\Services\PlaceService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    
    private $placeService;
    
    public function __construct()
    {
        $this->placeService = new PlaceService();
    }
    
    public function index(Request $request)
    {
    
        $poskoes = $this->placeService->getList($request->input("posko"), 8);
        
        if ($poskoes != null) {
            foreach ($poskoes as $key => $posko) {
                $coordinate["lat"] = json_decode($posko->additional_info)->geometry->coordinates[1];
                $coordinate["lon"] = json_decode($posko->additional_info)->geometry->coordinates[0];
                
                $poskoes[$key]->coordinate = $coordinate;
            }
        }
        
        return view('posko', ['poskoes' => $poskoes]);
    }
    
    public function detail($slug)
    {
        $posko = $this->placeService->getPlaceByCode($slug);
        $coordinate['lat'] = json_decode($posko->additional_info)->geometry->coordinates[1];
        $coordinate['lon'] = json_decode($posko->additional_info)->geometry->coordinates[0];
        
        $posko->coordinate = $coordinate;
        
        
        if (is_null($posko)) {
            return abort(404);
        } else {
            return view('detail', ['posko' => $posko]);
        }
    }
    
    
}