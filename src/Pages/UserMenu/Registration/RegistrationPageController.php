<?php
namespace App\Pages\UserMenu\Registration;

class RegistrationPageController
{
    public function registration()
    {
        $registration = new RegistrationView(new RegistrationPageModel());
        return $registration->render();
    }
}