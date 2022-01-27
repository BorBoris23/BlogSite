<?php
namespace App\Pages\UserMenu\Authorization\AuthorizationControllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\InvalidPasswordException;
use App\Exceptions\NoUserWithThisLoginException;
use App\Pages\UserMenu\Authorization\AuthorizationPageModel;
use App\Pages\UserMenu\Authorization\AuthorizationView;
use App\Models\User;

class AuthorizationController
{
    private  $authorizationModel;

    public function __construct()
    {
        $this->authorizationModel = new AuthorizationPageModel();
    }

    public function doAuthorization()
    {
        try {
            $User = $this->userDataVerification();
            $this->sessionStart($User->id, $User->email);
            header('Location: /');
            die();
        } catch (ApplicationException $e) {
            $this->authorizationModel->exception = $e;
            $this->authorizationModel->userLogin = $_POST['loginOreEmail'];
            return (new AuthorizationView($this->authorizationModel))->render();
        }
    }

    private function userDataVerification()
    {
        $User = $User = User::where('email', '=', $_POST['loginOreEmail'])
            ->orWhere('login', '=', $_POST['loginOreEmail'])->first();
        if($User === null) {
            throw new NoUserWithThisLoginException('Неправильный login или email пользователя');
        } else if($User->password !== $_POST['password']) {
            throw new InvalidPasswordException('Неверный пароль');
        } else {
            return $User;
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
