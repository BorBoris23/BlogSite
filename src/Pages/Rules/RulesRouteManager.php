<?php
namespace App\Pages\Rules;

use App\RouteManager;

class RulesRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('rules', [RulesController::class, 'rules']);
    }
}
