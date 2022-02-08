<?php
namespace App\Pages\AdminPage;

use App\Pages\AdminPage\AdminControllers\AdminController;
use App\Pages\AdminPage\AdminControllers\AdminPageController;
use App\RouteManager;

class AdminPageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('admin', [AdminPageController::class, 'admin']);
        $this->router->post('admin', [AdminController::class, 'changeUserRole']);
    }
}

