<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{

    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     */
   
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
      return $this->belongsToMany(Role::class,'role_user');
    }

    public function role()
    {
      return $this->roles()->first()->name;
    }

}
