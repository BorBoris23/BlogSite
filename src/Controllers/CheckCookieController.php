<?php
namespace App\Controllers;

class CheckCookieController
{
    public static function isCookie()
    {
        if(isset($_COOKIE['email'])) {
            return true;
        } else {
            return false;
        }
    }
}