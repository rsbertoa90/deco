<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    //
    public function findOrRegister()
    {
        $fbUser =  Socialite::driver('facebook')->user();
        // dd(Auth::user());
        if ($user = User::where('email',$fbUser->email)->get()->first())
        {
            Auth::login($user);
            return redirect('/');
        }
        else
        {
            $new = new User(); 
            $new->email = $fbUser->email;
            $new->name = $fbUser->name;
            $new->provider='facebook';
            $new->provider_id = $fbUser->id;
            $new->avatar = $fbUser->avatar;
            $new->password = 'facebook';
            $new->save();
            Auth::login($new);
            return redirect('/');
            
        }
    }
}
