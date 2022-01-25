<?php
namespace App\Pages\UserMenu;

use App\Pages\UserMenu\Authorization\AuthorizationController;
use App\Pages\UserMenu\Authorization\AuthorizationPageController;
use App\Pages\UserMenu\Authorization\LogAutController;
use App\Pages\UserMenu\PersonalArea\PersonalAreaPageController;
use App\Pages\UserMenu\Registration\RegistrationPageController;
use App\Pages\UserMenu\Registration\RegistrationController;
use App\RouteManager;

class UserMenuRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('authorization', [AuthorizationPageController::class, 'authorization']);
        $this->router->post('authorization', [AuthorizationController::class, 'doAuthorization']);
        $this->router->get('logAut', [LogAutController::class, 'logAut']);
        $this->router->get('personalArea', [PersonalAreaPageController::class, 'personalArea']);
        $this->router->get('registration', [RegistrationPageController::class, 'registration']);
        $this->router->post('registration', [RegistrationController::class, 'doRegistration']);
    }
}