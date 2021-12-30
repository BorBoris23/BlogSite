<?php
namespace App\Pages\Registration;

use App\Models\User;

class RegistrationController
{
    public function doRegistration()
    {
        $User = User::where('login', '=', $_POST['login'])->first();

        if($User === null) {
            $table = new User;
            $table->name = $_POST['name'];
            $table->login = $_POST['login'];
            $table->email = $_POST['email'];
            $table->password = $_POST['password'];
            $table->save();
        } else {
            echo 'no empty';
        }
    }
}
