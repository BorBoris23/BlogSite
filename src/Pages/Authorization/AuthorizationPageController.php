<?php
namespace App\Pages\Authorization;

class AuthorizationPageController
{
    public function authorization()
    {
        $authorization = new AuthorizationView();
        return $authorization->render();
    }
}