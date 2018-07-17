<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    //
    protected $guarded = [];

    public static function ActiveGuests()
    {
      return self::whereNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(10)))->get();;
    }

    public static function ActiveloggedUsers()
    {
     return self::whereNotNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(10)))->get();
    }


}
