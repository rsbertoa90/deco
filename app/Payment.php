<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaymentType;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Event;
use App\User;
use App\Inscription;
use App\UnregisteredUser;

class Payment extends Model
{

    protected $guarded=[];
    //

    public function inscriptions(){
        return $this->belongsToMany(Inscription::class);
    }

    public function cancel(){
        foreach($this->inscriptions as $insc){
            $insc->recalculatePayd();
        }
        return $this;
    }

   
}
