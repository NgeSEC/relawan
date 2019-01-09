<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;

class WelcomeController extends Controller
{
    
    private $placeService;
    
    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }
    
    public function index()
    {
    
        $posko = $this->placeService->getPoskoLeaflet();
    
        return view('welcome', ['poskoList' => json_encode($posko)]);
        
    }
    
}