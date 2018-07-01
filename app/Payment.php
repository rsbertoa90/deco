<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaymentType;
use App\Inscription;

class Payment extends Model
{
    protected $guarded=[];
    //

    public function type(){
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }
  
    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }
}
