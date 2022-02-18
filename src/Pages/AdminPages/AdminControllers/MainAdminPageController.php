<?php
namespace App\Pages\AdminPages\AdminControllers;

use App\Pages\AdminPages\AdminViews\MainAdminView;

class MainAdminPageController
{
    public function admin()
    {
        return new MainAdminView();
    }
}