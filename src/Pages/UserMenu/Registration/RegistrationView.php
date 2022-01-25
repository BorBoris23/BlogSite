<?php
namespace App\Pages\UserMenu\Registration;

use App\Pages\UserMenu\UserMenuView;

class RegistrationView extends UserMenuView
{
    public function renderContent()
    {
        return
            '<h1 class="">Registration</h1>
            '.$this->renderExceptionMessage().'
            <form name="Registration" class="" action="#" method="post">
                <input type="text" placeholder="Enter your name" class="" required name="name" value="'.$this->model->userName.'">
                <input type="text" placeholder="Enter your user name" class="" required name="login" value="'.$this->model->userLogin.'">
                <input type="email" placeholder="Enter your email" class="" required name="email" value="'.$this->model->userEmail.'">
                <input type="password" placeholder="Enter your password" class="" required name="password">
                <input type="hidden" name="action_name" value="user_reg">
                <button class="button" type="submit">Sign up</button>
            </form>';
    }
}