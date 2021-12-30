<?php
namespace App\Pages\Authorization;

use App\Models\User;

class AuthorizationController extends User
{
    public function doAuthorization()
    {
        $User = User::where('login', '=', $_POST['loginOreEmail'])->first();

        if($User === null) {
            $User = User::where('email', '=', $_POST['loginOreEmail'])->first();

            if($User === null) {
                echo 'no user';
            }
        }

        if($User->password === $_POST['password']) {
            $this->sessionStart($User->id, $User->email);
            header('Location: /');
            die();
        } else {
            echo 'no user password';
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
