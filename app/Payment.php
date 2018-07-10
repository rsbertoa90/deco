<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaymentType;
use App\Inscription;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use softDeletes;
    protected $guarded=[];
    //

    public function type(){
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }
  
    public function inscriptions()
    {
        return $this->belongsToMany(Inscription::class);
    }
}
