<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
        return view('layouts.adminmaster');
    })->name('dashboard');
});

Route::get('/partnership', [HomeController::class, 'partnership'])->name('partnership');
Route::get('/detailpartner', [HomeController::class, 'detailpartner'])->name('detailpartner');
Route::get('/detailkelas', [HomeController::class, 'detailkelas'])->name('detailkelas');
Route::get('/termofservices', [HomeController::class, 'termofservices'])->name('termofservices');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');


// Route::prefix('google')->name('google')->group( function(){
//     Route::get('login', [GoogleController::class, 'LoginWithGoogle'])->name('login');
//     Route::any('callback', [GoogleController::class, 'CallbackFromGoogle'])->name('callback');
// });