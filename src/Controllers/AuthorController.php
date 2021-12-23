<?php
namespace App\Controllers;

use App\Models\User;
use App\DbQueries;

class AuthorController extends User
{
    public function doAuthorization()
    {
        if(DbQueries::selectUserByEmail($_POST['loginOreEmail']) !== null ||
            DbQueries::selectUserByLogin($_POST['loginOreEmail']) !== null) {
                if(DbQueries::selectUserByPassword($_POST['password']) !== null) {
                    if(DbQueries::selectUserByEmail($_POST['loginOreEmail']) !== null) {
                        $usersRecord = DbQueries::selectUserByEmail($_POST['loginOreEmail']);
                    } else {
                        $usersRecord = DbQueries::selectUserByLogin($_POST['loginOreEmail']);
                    }
                    $usersId = $usersRecord->id;
                    $userEmail = $usersRecord->email;
                    $this->sessionStart($usersId, $userEmail);
                    header('Location: /');
                } else {
                    echo('no ok');
                }
        } else {
            echo ('ne ok');
        }
    }
    private function sessionStart($usersId, $userEmail)
    {
        session_start();
        $_SESSION['isAuthorUser'] = true;
        $_SESSION['userId'] = $usersId;
        setcookie("email", $userEmail, time() + 2592000, "/");
    }
}
