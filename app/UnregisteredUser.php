<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Inscription;

class UnregisteredUser extends Model
{
    //
    protected $table ='unregistered_users';

    public static function findOrCreate($fbname)
    {
        $user = self::where('fbname',$fbname)->get()->first();
        
        if($user){return $user;}

        else {
            $user = new UnregisteredUser();
            $user->fbname = $fbname;
            $user->save();
            return $user;
        }
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }

  
}
