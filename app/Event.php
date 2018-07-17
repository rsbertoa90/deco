<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Seminar;
use App\User;
use App\Inscription;
use App\Program;
use Gloudemans\Shoppingcart\Contracts\Buyable;


class Event extends Model implements Buyable
{
    //
    use SoftDeletes;
    
    protected $table = 'events';
    protected $guarded =[];
    protected $dates = ['created_at','updated_at','date','deleted_at'];

  

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

    public static function past($mode)
    {
        return self::where('date','<', now())->where('mode',$mode)->get();
    }

    public static function future($mode)
    {
        return self::where('date','>=', now())->where('mode',$mode)->get();
    }


    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->seminar->title;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    public function isInscribed(User $user)
    {
        return $this->inscriptions()->where('user_id',$user->id)->get()->first();
    }
}
