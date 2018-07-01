<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;

class PaymentType extends Model
{
    protected $guarded=[];
    protected $table = 'payment_types';

    public function payments(){
        return $this->hasMany(Payment::class,'payment_id','id');
    }
}
