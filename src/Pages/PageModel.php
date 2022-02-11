<?php
namespace App\Pages;

use App\Models\User;

class PageModel
{
    public $exception;

    public function getCurrentUser()
    {
        return User::where('email', '=', $_COOKIE['email'])->first();
    }
}