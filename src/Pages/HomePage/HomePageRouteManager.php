<?php
namespace App\Pages\HomePage;

use App\RouteManager;

class HomePageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('', [HomePageController::class, 'index']);
    }
}

$HomePageRouteManager = new HomePageRouteManager();