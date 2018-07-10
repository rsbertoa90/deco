<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    //
    public function findOrRegister()
    {
        $user =  Socialite::driver('facebook')->user();
        dd($user);
    }
}
