<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the daftar posko.
     *
     * @return \Illuminate\Http\Response
     */
    public function posko()
    {
        return view('posko');
    }

    public function detail($slug)
    {
        return view('detail');
    }

    public function search($terms)
    {
        return view('search', compact('terms'));
    }
}
