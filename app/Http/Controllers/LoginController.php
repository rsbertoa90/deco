<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class LoginController extends Controller
{
    //
    public function findOrRegister()
    {
        $fbUser =  Socialite::driver('facebook')->user();
        dd($fbUser);
        if ($user = User::where('email',$fbUser->email)->get()->first())
        {
            Auth::login($user);
            return redirect('/');
        }
        else
        {
            $new = new User(); 
            $new->email = $fbUser->user->email;
            $new->name = $fbUser->name;
            $new->provider='facebook';
            $new->provider_id = $fbUser->id;
            $new->avatar = $fbUser->avatar;
            $new->save();
            Auth::login($new);
            return redirect('/');
            
        }
    }
}
