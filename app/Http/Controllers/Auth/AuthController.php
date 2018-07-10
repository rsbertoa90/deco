<?php

namespace App\Http\Controllers;
use Auth;
use Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function findOrRegister()
    {
        $user =  Socialite::driver('facebook')->user();
        dd($user);
    }
}
