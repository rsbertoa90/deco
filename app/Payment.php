<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaymentType;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Event;
use App\User;
use App\UnregisteredUser;

class Payment extends Model
{

    protected $guarded=[];
    //

    public function type(){
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }

    public function events(){
        return $this->belongsToMany(Event::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function unregisteredUser(){
        return $this->belongsTo(UnregisteredUser::class);
    }
}
