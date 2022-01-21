<?php
namespace App\Pages\UsersMenu\Registration;
use App\Exceptions\ApplicationException;
use App\Exceptions\DuplicateUserNameException;
use App\Models\User;

class RegistrationController
{
    private  $registrationModel;

    public function __construct()
    {
        $this->registrationModel = new RegistrationPageModel();
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
            $table->save();
            header("Location: /authorization");
            die();
        } catch (ApplicationException $e) {
            $this->registrationModel->exception = $e;
            $this->registrationModel->userName = $_POST['name'];
            $this->registrationModel->userLogin = $_POST['login'];
            $this->registrationModel->userEmail = $_POST['email'];
            return (new RegistrationView($this->registrationModel))->render();
        }
    }

    private function checkingUserNameForDuplicate()
    {
        $User = User::where('login', '=', $_POST['login'])->first();
        if($User !== null) {
            throw new DuplicateUserNameException('Пользователь с таким именнем уже существует');
        }
    }
}
