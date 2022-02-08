<?php
namespace App\Pages\UserMenuPage;

use App\Pages\UserMenuPage\Authorization\AuthorizationControllers\AuthorizationController;
use App\Pages\UserMenuPage\Authorization\AuthorizationControllers\AuthorizationPageController;
use App\Pages\UserMenuPage\Authorization\AuthorizationControllers\LogAutController;
use App\Pages\UserMenuPage\PersonalArea\PersonalAreaPageController;
use App\Pages\UserMenuPage\Registration\RegistrationControllers\RegistrationPageController;
use App\Pages\UserMenuPage\Registration\RegistrationControllers\RegistrationController;
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