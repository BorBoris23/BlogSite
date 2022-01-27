<?php
namespace App\Pages\UserMenu\Registration\RegistrationControllers;

use App\Pages\UserMenu\Registration\RegistrationPageModel;
use App\Pages\UserMenu\Registration\RegistrationView;

class RegistrationPageController
{
    public function registration()
    {
        $registration = new RegistrationView(new RegistrationPageModel());
        return $registration->render();
    }
}