<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Seminar;
use App\User;
use App\Inscription;
use App\Program;

class Event extends Model
{
    //
    use SoftDeletes;
    protected $table = 'events';
    protected $guarded =[];
    protected $dates = ['created_at','updated_at','date'];

  

    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes["price"] = $value*100;
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'inscriptions');
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }

    public function getDate(){
        return  $this->date->format('d/m/y');
    }
   
    public function getTime(){
        return  $this->date->format('H:i A');
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public static function past()
    {
        return self::where('date','<', now())->get();
    }

    public static function future()
    {
        return self::where('date','>=', now())->get();
    }
}
