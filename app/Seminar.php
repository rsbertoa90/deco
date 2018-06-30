<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seminar extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    
    public function programs()
    {
        return $this->hasMany(App\Program::class);
    }






}
