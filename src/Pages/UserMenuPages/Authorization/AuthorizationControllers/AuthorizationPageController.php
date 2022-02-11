<?php
namespace App\Pages\UserMenuPages\Authorization\AuthorizationControllers;

use App\Pages\UserMenuPages\Authorization\AuthorizationView;
use App\Pages\UserMenuPages\UserMenuPageModel;

class AuthorizationPageController
{
    public function authorization()
    {
        return new AuthorizationView(new UserMenuPageModel());
    }
}