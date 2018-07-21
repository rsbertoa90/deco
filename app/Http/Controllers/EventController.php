<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cart;
use App\Seminar;


class EventController extends Controller 
{
    public function updateCity(Request $request)
    {
        if($request->id && $request->state && $request->city){
            $event = Event::find($request->id);
            $event->state = $request->state;
            $event->city = $request->city;
            $event->save();
        }
    }

    public function updateDate(Request $request)
    {
        if($request->id && $request->date)
        {
            $event = Event::find($request->id);
            $date = Carbon::parse($request->date);
            $date->hour = $event->date->hour;
            $date->minute = $event->date->minute;

            $event->date = $date;
            $event->save();
        
        }
    }

    public function updateTime(Request $request)
    {
        if($request->id && $request->time)
        {
            $event = Event::find($request->id);
            $date = new Carbon($request->time);
           
            $date->year = $event->date->year;
            $date->month = $event->date->month;
            $date->day = $event->date->day;
            $event->date = $date;
            $event->save();
          
        }
    }

    public function updateNumericField(Request $request)
    {
        if($request->id && $request->field && $request->value)
        {
            $event = Event::find($request->id);
            $field = $request->field;
            $event->$field = $request->value;
            $event->save();
            dd($event->$field);
        }
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/admin');
    }

    public function createForm()
    {
        return view('admin.events.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'seminar_id'=>'required',
            'date' => 'required',
            'time' => 'required'
            ]);

        $data = $request->except('_token','date','time');
        $date = new Carbon("{$request->date} {$request->time}");
        $data['date']=$date;
        $ev = Event::create($data);
      
        return redirect('/admin');
    }

    public function addToCart($id)
    {
        $event = Event::find($id);
        //$user = auth()->user();
        Cart::add($event,1);
        // Cart::store($user->id);
        return redirect('/');
    }

    public function removeFromCart($id)
    {
        $event = Event::find($id);
        $cartItem = Cart::content()->where('id',$event->id)->first();
        
        //$user = auth()->user();
        
        Cart::remove($cartItem->rowId);
        // Cart::store($user->id);
        return redirect('/');
    }

    public function getSeminarName($id)
    {
        if($id){
            $seminar = Seminar::find($id);
            return array($id);
        }
    }

    public function getByCity($city){
        return Event::with('seminar')->where('date','>=', now())->where('city',$city)->get();
    }

    public function getOnlineEvents()
    {
        return Event::with('seminar')->where('date','>=', now())->where('mode','online')->get();
    }

}
