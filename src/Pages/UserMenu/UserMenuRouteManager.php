<?php
namespace App\Pages\UserMenu;

use App\Pages\UserMenu\Authorization\AuthorizationControllers\AuthorizationController;
use App\Pages\UserMenu\Authorization\AuthorizationControllers\LogAutController;
use App\Pages\UserMenu\Authorization\AuthorizationControllers\LogInController;
use App\Pages\UserMenu\PersonalArea\PersonalAreaControllers\EditPersonalDataController;
use App\Pages\UserMenu\PersonalArea\PersonalAreaControllers\PersonalAreaController;
use App\Pages\UserMenu\Registration\RegistrationControllers\RegistrationController;
use App\Pages\UserMenu\Registration\RegistrationControllers\RegisterController;
use App\RouteManager;

class UserMenuRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('authorization', [AuthorizationController::class, 'authorization']);
        $this->router->post('authorization', [LogInController::class, 'logIn']);

        $this->router->get('logAut', [LogAutController::class, 'logAut']);

        $this->router->get('personalArea', [PersonalAreaController::class, 'personalArea']);
        $this->router->post('personalArea', [EditPersonalDataController::class, 'editDate']);

        $this->router->get('registration', [RegistrationController::class, 'registration']);
        $this->router->post('registration', [RegisterController::class, 'register']);
    }
}