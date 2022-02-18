<?php
namespace App\Models;

class PageModel
{
    public $currentUser;

    public function __construct()
    {
        $this->currentUser = $this->getCurrentUser();
    }

    public function getCurrentUser()
    {
        $result = '';
        if(isset($_COOKIE['email'])) {
            $result = User::where('email', '=', $_COOKIE['email'])->first();
        }
        return $result;
    }
}