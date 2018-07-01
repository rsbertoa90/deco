<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Seminar;
use App\Payment;

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
        $users = User::all();
        $seminars = Seminar::all();
        $payments = Payment::all();
        return view('index',compact('seminars','payments','users'));
    }
}
