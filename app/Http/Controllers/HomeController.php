<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Seminar;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $fbuser = Socialite::driver('facebook')->user();
       if($fbUser){
           dd($fbUser);
       }
        $seminars = Seminar::all();
        $user = auth()->user();
        return view('index',compact('seminars','user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
