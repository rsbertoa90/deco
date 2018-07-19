<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use App\Event;

class CityController extends Controller
{
    public function countrys()
    {
        $countrys = [
            'argentina', 'brasil','chile','uruguay','paraguay'
        ];

        return $countrys->toJson();
    }

    public function states($country)
    {
        return State::all()->toJson();
    }

    public function citys($state)
    {
        return City::where('state_id',$state)->get()->toJson(JSON_PRETTY_PRINT);
    }

    public function getActiveCitys(){
        $citys = Event::where('date','>=', now())->where('city','<>','')->groupBy('city');
        // $citys->pluck('city');
        return $citys->pluck('city');
    }
}
