<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\PersonalData;
use App\Inscription;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cart;
use App\Event;

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
        'name', 'email', 'password', 'provider', 'provider_id'];

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

    // public function role()
    // {
    //   return $this->roles()->first()->name;
    // }

    public function isAdmin()
    {
        return $this->roles()->where('name','admin')->first();
    }

    public function data(){
        return $this->hasOne(PersonalData::class);
    }

    

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function paydInscriptions()
    {
        return $this->inscriptions()->where('status','pagado')->get();
    }

    public function pendInscriptions()
    {
        return $this->inscriptions()->where('status','pendiente')->get();
    } 

    public function hasInCart(Event $event)
    { 
      return  Cart::content()->where('id',$event->id)->first();
    }
    

}
