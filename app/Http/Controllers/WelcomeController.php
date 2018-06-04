<?php

namespace App\Http\Controllers;

use Illuminati\Http\Request;
use Mapper;

class WelcomeController extends Controller
{
    public function index()
    {
        Mapper::map(-7.5407175,110.4457241);
        return view ('welcome');

    }

}