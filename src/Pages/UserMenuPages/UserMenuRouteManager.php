<?php
namespace App\Pages\UserMenuPages;

use App\Pages\UserMenuPages\Authorization\AuthorizationControllers\AuthorizationController;
use App\Pages\UserMenuPages\Authorization\AuthorizationControllers\AuthorizationPageController;
use App\Pages\UserMenuPages\Authorization\AuthorizationControllers\LogAutController;
use App\Pages\UserMenuPages\PersonalArea\PersonalAreaControllers\PersonalAreaPageController;
use App\Pages\UserMenuPages\PersonalArea\PersonalAreaControllers\PersonalAreaController;
use App\Pages\UserMenuPages\Registration\RegistrationControllers\RegistrationPageController;
use App\Pages\UserMenuPages\Registration\RegistrationControllers\RegistrationController;
use App\RouteManager;

class UserMenuRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('authorization', [AuthorizationPageController::class, 'authorization']);
        $this->router->post('authorization', [AuthorizationController::class, 'doAuthorization']);

        $this->router->get('logAut', [LogAutController::class, 'logAut']);

        $this->router->get('personalArea', [PersonalAreaPageController::class, 'personalArea']);
        $this->router->post('personalArea', [PersonalAreaController::class, 'upDate']);

        $this->router->get('registration', [RegistrationPageController::class, 'registration']);
        $this->router->post('registration', [RegistrationController::class, 'doRegistration']);
    }
}