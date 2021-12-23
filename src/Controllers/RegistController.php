<?php
namespace App\Controllers;

use App\Models\User;
use App\DbQueries;

class RegistController
{
    public function doRegistration()
    {
        if(DbQueries::selectUserByLogin($_POST['login']) === null &&
            DbQueries::selectUserByEmail($_POST['email']) === null) {
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
