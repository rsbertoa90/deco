<?php

namespace App;
use App\User;
use App\UnregisteredUser;
use App\Event;
use App\Payment;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unregisteredUser(){
        return $this->belongsTo(UnregisteredUser::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function payments(){
        return $this->belongsToMany(Payment::class);
    }
}
