<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;

class PaymentController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::content();
        if(!$user){return redirect('/register');}
    }
    
    public function userForm()
    {
        if(!Auth::check()){
            return redirect('/');
        }
        else {
            $user = Auth::user();
            return view('user.register-payment',compact('user'));
        }
    }

    public function register(Request $request)
    {

    }
}
