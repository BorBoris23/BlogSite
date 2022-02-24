<?php
namespace App\Pages\UserMenu\Authorization\AuthorizationControllers;

use App\Pages\UserMenu\Authorization\AuthorizationView;
use App\Pages\UserMenu\UserMenuModel;

class AuthorizationController
{
    public function authorization()
    {
        return new AuthorizationView(new UserMenuModel());
    }
}