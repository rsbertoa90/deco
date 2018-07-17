<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;
  protected $guarded = [];
  protected $dates = ['deleted_at','created_at','updated_at'];
  
  public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
