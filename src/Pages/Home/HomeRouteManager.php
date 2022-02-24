<?php
namespace App\Pages\Home;

use App\Pages\Home\HomeControllers\HomeController;
use App\RouteManager;

class HomeRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('', [HomeController::class, 'index']);
    }
}
