<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\user;

class LoginController extends Controller
{
    //
    public function findOrRegister()
    {
        $fbUser =  Socialite::driver('facebook')->user();

        if ($user = User::where('email',$fbUser->email)->get()->first())
        {
            Auth::login($user);
            return redirect('/');
        }
        else
        {
            $new = $fbUser->user;
            $new->provider='facebook';
            $new->provider_id = $fbUser->id;
            $new->id = null;
            $new->avatar = $fbUser->avatar;
            $new->save();
            Auth::login($user);
            return redirect('/');
            
        }
    }
}
