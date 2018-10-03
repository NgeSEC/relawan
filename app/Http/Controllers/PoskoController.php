<?php
/**
 * Created by PhpStorm.
 * User: banumelody
 * Date: 17/06/18
 * Time: 00.46
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Mapper;

class PoskoController extends Controller
{
    public function index()
    {
//        $poskos = DB::table('contents')->get();
        $poskos = DB::table('contents')->paginate(8);

        return view('posko', ['poskos' => $poskos]);
    }
}