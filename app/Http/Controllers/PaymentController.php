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
use App\Inscription;
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

    
    public function types(){
        return PaymentType::all()->pluck('name');
    }

    public function unregisteredPayment(Request $request)
    {
        // Traje un array de id's de inscripciones.traigo los objetos
        $inscriptions = Inscription::find($request->inscriptions);
        // Actuallizo el mail del usuario
        if ($request->email){
            $user  = $inscriptions[0]->unregisteredUser;
            $user->email = $request->email;
            $user->save();
        }
        // guardo los datos del pago
        $payment = new Payment();
        $payment->amount = $request->amount;
        $payment->ticket = $request->ticket;
        $payment->type = $request->type;
        $payment->comment = $request->comment;
        $payment->save();
        $payment->inscriptions()->sync($inscriptions);

        // le asigno a las incripciones el monto que les corresponde del pago
        $total = $request->total;
        // dd($request->except('_token'));
        foreach ($inscriptions as $insc){
             $insc->payd += $request->amount * ($insc->event->price / $request->total) ;
             $insc->save();
        }
        return redirect('/admin/inscriptions');
    }   
}
