<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Seminar extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }






}
