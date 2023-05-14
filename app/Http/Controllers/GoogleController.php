<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function LoginWithGoogle(){

        return Socialite::driver('google')->redirect('login');
    }

    public function CallbackFromGoogle(){
        try {
            $user = Socialite::driver('google')-user();

            dd($user);
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors('login_failed', 'Failed to login with Google');;
        }
    }
}
