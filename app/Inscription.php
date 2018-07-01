<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\User;
use App\Event;
class Inscription extends Model
{
    protected $guarded = [];
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    
}
