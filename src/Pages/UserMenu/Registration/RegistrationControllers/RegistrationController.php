<?php
namespace App\Pages\UserMenu\Registration\RegistrationControllers;

use App\Pages\UserMenu\Registration\RegistrationView;
use App\Pages\UserMenu\UserMenuModel;

class RegistrationController
{
    public function registration()
    {
        return new RegistrationView(new UserMenuModel());
    }
}