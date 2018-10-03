<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.apps.home');
    }

    public function posko()
    {
        $poskos = DB::table('contents')->paginate(15);
        return view('admin.apps.posko', ['poskos' => $poskos]);
    }
}
