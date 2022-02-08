<?php
namespace App\Pages\UserMenuPage\Authorization\AuthorizationControllers;

use App\Pages\UserMenuPage\Authorization\AuthorizationView;
use App\Pages\UserMenuPage\Authorization\AuthorizationPageModel;

class AuthorizationPageController
{
    public function authorization()
    {
        return new AuthorizationView(new AuthorizationPageModel());
    }
}