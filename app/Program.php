<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    protected $guarded=[];
    use SoftDeletes;

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
