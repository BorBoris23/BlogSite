<?php
namespace App\Pages\UserMenuPages\Registration\RegistrationControllers;

use App\Pages\UserMenuPages\Registration\RegistrationView;
use App\Pages\UserMenuPages\UserMenuPageModel;

class RegistrationPageController
{
    public function registration()
    {
        return new RegistrationView(new UserMenuPageModel());
    }
}