<?php
namespace App\Pages\UserMenuPages\Registration\RegistrationControllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\DuplicateUserNameException;
use App\Pages\UserMenuPages\Registration\RegistrationView;
use App\Models\User;
use App\Pages\UserMenuPages\UserMenuPageModel;

class RegistrationController
{
    private  $model;

    public function __construct()
    {
        $this->model = new UserMenuPageModel();
    }

    public function doRegistration()
    {
        try {
            $this->checkingUserNameForDuplicate();
            $table = new User;
            $table->name = $_POST['name'];
            $table->login = $_POST['login'];
            $table->email = $_POST['email'];
            $table->password = $_POST['password'];
            $table->pathToAvatar = 'img/users-avatars/unknown.jpg';
            $table->save();
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
