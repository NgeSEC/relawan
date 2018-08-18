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

    public function search(Request $request)
    {
        return view('search')->with('search', $request->search);
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function trc()
    {
        return view('termsandcondition');
    }

    public function privacypolicy()
    {
        return view('privacy');
    }
    
    public function about()
    {
        return view('aboutus');
    }

    public function admin()
    {
        return view('admin.apps.home');
    }
}
