<?php
namespace App\Pages\RulesPage;

use App\RouteManager;

class RulesPageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('rules', [RulesPageController::class, 'rules']);
    }
}
