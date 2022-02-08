<?php
namespace App\Pages\UserMenuPage\Registration\RegistrationControllers;

use App\Pages\UserMenuPage\Registration\RegistrationPageModel;
use App\Pages\UserMenuPage\Registration\RegistrationView;

class RegistrationPageController
{
    public function registration()
    {
        return new RegistrationView(new RegistrationPageModel());
    }
}