<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    // Tampilan menu master
    public function mitra(){
        return view('admin.master.mitra.index');
    }

    //Tampilan Edit menu master
    public function tambah(){
        return view('admin.master.user.tambah');
    }
}
