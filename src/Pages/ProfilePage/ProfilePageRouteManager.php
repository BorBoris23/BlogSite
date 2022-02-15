<?php
namespace App\Pages\ProfilePage;

use App\Pages\ProfilePage\ProfilePageControllers\ProfilePageController;
use App\Pages\ProfilePage\ProfilePageControllers\ProfileController;
use App\RouteManager;

class ProfilePageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('profile', [ProfilePageController::class, 'profile']);
        $this->router->post('profile', [ProfileController::class, 'subscribe']);
    }
}