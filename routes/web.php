<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.landing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role == '0') {
            return view('layouts.landing');
        } elseif (Auth::user()->role == '1') {
            return view('admin.index');
        } elseif (Auth::user()->role == '2') {
            return view('mitra.index');
        } elseif (Auth::user()->role == '3') {
            return view('pelatih.index');
        } elseif (Auth::user()->role == '4') {
            return view('siswa.index');
        } 
    })->name('dashboard');
});

// ADMIN TAMPILAN Master
Route::get('/mitra', [AdminController::class, 'mitra'])->name('mitra');

// HOME TAMPILAN
Route::get('/redirects', [HomeController::class, "index"]);
Route::get('/partnership', [HomeController::class, 'partnership'])->name('partnership');
Route::get('/detailpartner', [HomeController::class, 'detailpartner'])->name('detailpartner');
Route::get('/detailkelas', [HomeController::class, 'detailkelas'])->name('detailkelas');
Route::get('/termofservices', [HomeController::class, 'termofservices'])->name('termofservices');

//
Route::get('/daftarmitra', [BayarController::class, 'daftarmitra'])->name('daftarmitra');

//USER
Route::get('/user', [UserController::class, 'user'])->name('user');
Route::get('/tambah', [UserController::class, 'tambah'])->name('tambah');
Route::post('/user/store', [UserController::class, 'store'])->name('store');