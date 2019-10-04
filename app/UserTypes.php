<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    const ADMIN_TYPE_ID = 1;
    const STAFF_TYPE_ID = 2;
    const USER_TYPE_ID = 3;

    public static function getAdminTypeID(){
        return self::where('name', User::ADMIN_NAME)->pluck('id')->first();
    }

    public static function getUserTypeID(){
        return self::where('name', User::USER_NAME)->pluck('id')->first();
    }

    public static function getStaffTypeID(){
        return self::where('name', User::STAFF_NAME)->pluck('id')->first();
    }
}
