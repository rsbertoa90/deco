<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

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
}
