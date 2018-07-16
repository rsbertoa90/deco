<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use MercadoPago;
use App\User;
use App\Payment;

class MercadoPagoController extends Controller
{

    public static function createPreference($items){
        MercadoPago\SDK::setClientId("6268560354643714");
        MercadoPago\SDK::setClientSecret("xInwcOGvrKYHsYnxxFA0djdr1MDd06Xy");

        $mpItems = [];

        foreach ($items as $item){
            # Create an item object
            $mpItem = new MercadoPago\Item();
            foreach($item as $key=>$value){
                $mpItem->$key=$value;
            }
            $mpItems[]=$mpItem;
        }

          # Create a preference object
        $preference = new MercadoPago\Preference();

        # Create a payer object
        $payer = new MercadoPago\Payer();
        $payer->email = auth()->user()->email;

        # Setting preference properties
        $preference->items = $mpItems;
        $preference->payer = $payer;
        # Save and posting preference
        $preference->save();
        return redirect ($preference->sandbox_init_point);
    }

    public function testUser()
    {
            MercadoPago\SDK::setClientId("5911500288474745");
            MercadoPago\SDK::setClientSecret("fGIYRF1djkqY8CvLaLVuVj0b7FFbsdja");
            MercadoPago\SDK::setAccessToken("TEST-5911500288474745-071511-dfe76374acb550ae4eff6d5b287171a8-31594761");

            $body = array(
                "json_data" => array(
                "site_id" => "MLA"
                )
            );

            $result = MercadoPago\SDK::post('/users/test_user', $body);

            dd($result);

    }
  
    



    public function login(){}

    public function loginRedirect(){}
        
    public function listener(){
        return response ('ok',200);
    }
}
