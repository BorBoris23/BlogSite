<?php
namespace App\Pages\UserMenu\Authorization\AuthorizationControllers;

use App\Pages\UserMenu\Authorization\AuthorizationView;
use App\Pages\UserMenu\Authorization\AuthorizationPageModel;

class AuthorizationPageController
{
    public function authorization()
    {
        $authorization = new AuthorizationView(new AuthorizationPageModel());
        return $authorization->render();
    }
}