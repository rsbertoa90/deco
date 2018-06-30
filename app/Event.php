<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    //
    use SoftDeletes;
    protected $guarded =[];
    protected $dates = ['created_at','updated_at','date'];

    public function program()
    {
        return $this->belognsTo(App\Program::class);
    }

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
}
