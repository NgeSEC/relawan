<?php
/**
 * Created by PhpStorm.
 * User: banumelody
 * Date: 17/06/18
 * Time: 00.46
 */

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    private $objPosko;

    public function __construct()
    {
        $this->objPosko = new Place();
    }

    public function index(Request $request)
    {

        $poskos = $this->objPosko->getList($request->input("posko"), 8);

        return view('posko', ['poskos' => $poskos]);
    }

    public function detail($slug)
    {
        $posko = $this->objPosko->getPlaceByCode($slug);

        if(is_null($posko)){
            return abort(404);
        } else {
            return view('detail', ['posko' => $posko]);
        }
    }


}