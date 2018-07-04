<?php
/**
 * Created by PhpStorm.
 * User: banumelody
 * Date: 17/06/18
 * Time: 00.46
 */

namespace App\Http\Controllers;

use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $poskos = Place::paginate(8);
        return view('posko', ['poskos' => $poskos]);
    }

    public function detail($slug)
    {
        $objPosko = new Place();
        $posko = $objPosko->getPlaceByCode($slug);

        if(is_null($posko)){
            return abort(404);
        } else {
            return view('detail', ['posko' => $posko]);
        }
    }
}