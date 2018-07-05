<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/admin');
    }
}
