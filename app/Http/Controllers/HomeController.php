<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function partnership(){

        return view('/partnership');
    }

    public function about(){

        return view('/about');
    }

    public function detailpartner(){

        return view('/detailpartner');
    }

    public function detailkelas(){

        return view('/detailkelas');
    }

    public function termofservices(){

        return view('/termofservices');
    }
}
