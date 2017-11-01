<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Home extends Controller
{
    //

    public function index()
    {
        return view('main.home');
    }

}
