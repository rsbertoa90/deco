<?php

namespace App;
use App\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Seminar extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'seminars';
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function pastEvents()
    {
        return $this->events()->where('date','<',now())->get();
    }

    public function futureEvents()
    {
        return $this->events()->where('date','>=',now())->orderBy('date')->get();
    }





}
