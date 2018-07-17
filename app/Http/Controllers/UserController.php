<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        $user  = Auth::user();
        return view('user.profile',compact('user'));
    }
}
