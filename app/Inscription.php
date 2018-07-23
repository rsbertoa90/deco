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
    
    public function recalculatePayd()
    {
        $payments = $this->payments()->where('status','not like','cancelado')->get();
        $payd = 0;
       
        
        foreach ($payments as $pay)
        {
            $total = 0;
            foreach ($pay->inscriptions as $insc)
            {
                $total += $insc->event->price;
            }
            
            if ($total == 0){
                $payd = 0;
            }else {
                $payd += $pay->amount * ($this->event->price / $total);
            }
        }

        $this->payd = $payd;
        $this->save();
    }
  
}
