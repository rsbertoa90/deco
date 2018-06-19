<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Session extends Model
{
    //

    public static function ActiveGuests()
    {
      return self::whereNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(10)))->get();;
    }

    public static function ActiveloggedUsers()
    {
     return self::whereNotNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(10)))->get();
    }


}
