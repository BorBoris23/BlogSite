<?php
namespace App\Pages\Registration;

class RegistrationPageController
{
    public function registration()
    {
        $authorization = new RegistrationView();
        return $authorization->render();
    }
}