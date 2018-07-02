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

    public function date(){
        return  $this->date->toDateString();
    }
    
    public function time(){
        return  $this->date->toTimeString();
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}
