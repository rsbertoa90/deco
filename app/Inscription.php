<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\User;
use App\Event;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscription extends Model
{
    use softDeletes;
    protected $guarded = [];
    
    public function payments()
    {
        return $this->belongsToMany(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    
}
