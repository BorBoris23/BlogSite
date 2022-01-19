<?php
namespace App\Pages\Registration;

class RegistrationPageController
{
    public function registration()
    {
        $registration = new RegistrationView(new RegistrationModel());
        return $registration->render();
    }
}