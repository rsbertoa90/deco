<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalData extends Model
{
    //
    protected $table = 'personal_data';
    protected $guarded = [];

    public function user(){
        return $this->BelongsTo(User::class);
    }

    public function fullName(){
        return "{$this->firstname} {$this->lastname}";
    }
}
