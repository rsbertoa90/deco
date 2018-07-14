<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use app\MercadoPago;
use MP;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MercadoPagoController extends Controller
{

    public function createPreference()
    {
        $items = [];
        # Create a preference object
        $preference = new MercadoPago\Preference();
        
        $payer = new MercadoPago\Payer();
        $payer->email = auth()->user()->email;

        $cartItems = Cart::content();
        foreach ($cartItems as $i)
        {
            # Create an item object
            $item = new MercadoPago\Item();
            $item->id = $i->id;
            $item->title = $i->name;
            $item->quantity = 1;
            $item->currency_id = "ARS";
            $item->unit_price = $i->price;
            $items[]=$item;
        }
        
        $preference->items = $items;
        $preference->payer = $payer;
        $preference->save();
        
        dd($preference);
        return redirect($preference->init_point);

  
    }



    public function login(){}

    public function loginRedirect(){}
        
    public function listener(){}
}
