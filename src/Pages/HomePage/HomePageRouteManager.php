<?php
namespace App\Pages\HomePage;

use App\Pages\HomePage\HomePageControllers\HomePageController;
use App\RouteManager;

class HomePageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('', [HomePageController::class, 'index']);
    }
}
