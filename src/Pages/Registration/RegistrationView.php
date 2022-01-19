<?php
namespace App\Pages\Registration;

use App\View\PageView;

class RegistrationView extends PageView
{
    private $registrationModel;
    private $exception;

    public function __construct($registrationModel)
    {
        $this->registrationModel = $registrationModel;
        $this->exception = $this->registrationModel->exception;
    }

    private function renderExceptionMessage()
    {
        $result = '';
        if($this->exception !== null) {
            $result = '<div>'.$this->exception->getMessage().'</div>';
        }
        return $result;
    }

    public function renderContent()
    {
        return
            '<h1 class="">Registration</h1>
            '.$this->renderExceptionMessage().'
            <form name="Registration" class="" action="#" method="post">
                <input type="text" placeholder="Enter your name" class="" required name="name" value="'.$this->registrationModel->userName.'">
                <input type="text" placeholder="Enter your user name" class="" required name="login" value="'.$this->registrationModel->userLogin.'">
                <input type="email" placeholder="Enter your email" class="" required name="email" value="'.$this->registrationModel->userEmail.'">
                <input type="password" placeholder="Enter your password" class="" required name="password">
                <input type="hidden" name="action_name" value="user_reg">
                <button class="button" type="submit">Sign up</button>
            </form>';
    }
}