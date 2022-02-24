<?php
namespace App\Pages\Admin\AdminControllers;

use App\Pages\Admin\AdminViews\MainAdminView;

class MainAdminController extends AdminController
{
    public function admin()
    {
        return new MainAdminView($this->pageSize);
    }
}
