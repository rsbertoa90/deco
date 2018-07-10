<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $table = 'payment_types';

    public function payments(){
        return $this->hasMany(Payment::class,'payment_id','id');
    }
}
