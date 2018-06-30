<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    //
    protected $table = 'personal_data';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function fullName(){
        return "{$this->firstname} {$this->lastname}";
    }
}
