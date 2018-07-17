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
    protected $dates = ['created_at','updated_at','deleted_at'];
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function pastEvents($mode)
    {
        return $this->events()->where('mode',$mode)->where('date','<',now())->get();
    }

    public function futureEvents($mode)
    {
        return $this->events()->where('mode',$mode)->where('date','>=',now())->orderBy('date')->get();
    }

    




}
