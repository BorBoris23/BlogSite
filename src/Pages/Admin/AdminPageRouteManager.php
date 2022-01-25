<?php
namespace App\Pages\Admin;

use App\RouteManager;

class AdminPageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('admin', [AdminPageController::class, 'admin']);
        $this->router->post('admin', [AdminController::class, 'changeUserRole']);
    }
}

$a = new AdminPageRouteManager();
