<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_type extends Model
{
    protected $Guarded=[];

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
