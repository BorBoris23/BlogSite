<?php
namespace App\Pages\UsersMenu\Authorization;

class AuthorizationPageController
{
    public function authorization()
    {
        $authorization = new AuthorizationView(new AuthorizationPageModel());
        return $authorization->render();
    }
}