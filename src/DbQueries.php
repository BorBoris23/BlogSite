<?php
namespace App;

use Illuminate\Database\Capsule\Manager as DB;

class DbQueries
{
    static function selectUserByLogin($login)
    {
        return DB::table('users')
            ->where('login', $login)
            ->first();
    }

    static function selectUserByEmail($email)
    {
        return DB::table('users')
            ->where('email', $email)
            ->first();
    }

    static function selectUserByPassword($password)
    {
        return DB::table('users')
            ->where('password', $password)
            ->first();
    }
}
