<?php
namespace App\Pages\Admin;

class AdminPageController
{
    public function admin()
    {
        $admin = new AdminView(new AdminModel());
        return $admin->render();
    }
}