<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $role=Auth::user()->role;
        $name =Auth()->user()->name;

        if($role=='1')
        {
            return view('admin.index');

        }

        if($role=='2')
        {
            return view('mitra.index');
        }

        if($role=='3')
        {
            return view('pelatih.index');
        }

        if($role=='4')
        {
            return view('siswa.index');
        }

        elseif($role=='0') {
            return view('layouts.landing');
        }
    }

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
