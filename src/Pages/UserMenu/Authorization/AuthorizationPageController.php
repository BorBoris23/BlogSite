<?php
namespace App\Pages\UserMenu\Authorization;

class AuthorizationPageController
{
    public function authorization()
    {
        $authorization = new AuthorizationView(new AuthorizationPageModel());
        return $authorization->render();
    }
}