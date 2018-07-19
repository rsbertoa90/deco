<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Event;
use MercadoPago;
use MP;
use MercadoPago\item;
use App\Payment;
use App\PaymentType;
use App\UnregisteredUser;

class PaymentController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::content();
        $events = [];
        foreach($cartItems as $item)
        {
            $events[$item->id] = Event::find($item->id);
        }
        $events=collect($events);
        if(!$user){return redirect('/register');}
        return view('user.payments',compact('user','cartItems','events'));
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
    
    private  function handleTransferPayment(){

    }
    private function handleMPpayment(Request $request){
        $items =[];
        foreach ($request->halfs as $id=>$half){
            $event = Event::find($id);
            
            $item =new \stdClass();
           

            $item->id = $event->id;
            $item->title = "{$event->seminar->title} - {$event->city} - {$event->date}";
            $item->quantity = 1;
            $item->currency_id = "ARS";
            if ($half){
                $item->unit_price = 23.85 / 2;
                $item->title += "- seña";
            }
            else {
                $item->unit_price = 23.85;
            }
            $item->unit_price *=1.1;
            $items[] = $item;        
        }
        return MercadoPagoController::createPreference($items);
    }

    public function newPayment(Request $request)
    {
        
        if ($request->method == 1){
            $this->handleTransferPayment($request);
        }
        else if ($request->method ==2){
            return $this->handleMPpayment($request);
        }

    }

    public function inscriptions(){
        $events = Event::future('presencial');
        return view('admin/inscriptions',compact('events'));
    }

    public function registerInscription(Request $request)
    {
        $request->validate([
            'events' => 'required',
            'fbname' => 'required'
        ]);
        $user = UnregisteredUser::findOrCreate($request->fbname);
      
        $payment = new Payment();
        $payment->user_type = 'unregistered';
        $payment->unregistered_user_id = $user->id;
        $payment->type =  $request->type;
        $payment->comments = $request->comments;
        $payment->save();
        foreach($request->events as $id){
            $event = Event::find($id);
            $payment->events()->attach($event);
        }
        return redirect('/admin/inscriptions');
    }

    public function types(){
        return PaymentType::all()->pluck('name');
    }
}
