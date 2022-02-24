<?php
namespace App\Pages\UserMenu\Registration\RegistrationControllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\DuplicateUserNameException;
use App\Pages\UserMenu\Registration\RegistrationView;
use App\Models\User;
use App\Pages\UserMenu\UserMenuModel;

class RegisterController
{
    private  $model;

    public function __construct()
    {
        $this->model = new UserMenuModel();
    }

    public function register()
    {
        try {
            $this->checkingUserNameForDuplicate();
            $user = new User;
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->pathToAvatar = 'img/users-avatars/unknown.jpg';
            $user->save();
            header("Location: /authorization");
            die();
        } catch (ApplicationException $e) {
            $this->model->exception = $e;
            $this->model->userName = $_POST['name'];
            $this->model->userLogin = $_POST['login'];
            $this->model->userEmail = $_POST['email'];
            return new RegistrationView($this->model);
        }
    }

    private function checkingUserNameForDuplicate()
    {
        $User = User::where('login', '=', $_POST['login'])->first();
        if($User !== null) {
            throw new DuplicateUserNameException('User with the same name already exists');
        }
    }
}
