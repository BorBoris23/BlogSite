<?php
namespace App\Pages\UsersMenu\Registration;

class RegistrationPageController
{
    public function registration()
    {
        $registration = new RegistrationView(new RegistrationPageModel());
        return $registration->render();
    }
}