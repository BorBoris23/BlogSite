<?php
namespace App\Pages\UserMenu\Authorization;

class LogAutController
{
    public function logAut()
    {
        session_start();
        session_destroy();
        unset($_COOKIE['email']);
        setcookie('email', null, -1, '/');
        header('Location: /');
        exit;
    }
}
