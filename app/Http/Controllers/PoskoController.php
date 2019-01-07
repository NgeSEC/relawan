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
        return $this->placeService->getPoskoLeaflet();
    }
}