<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function program()
    {
        return $this->belongsToMany(App\Program::class);
    }

}
