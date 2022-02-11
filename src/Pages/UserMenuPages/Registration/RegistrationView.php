<?php
namespace App\Pages\UserMenuPages\Registration;

use App\Pages\PagesWithExceptionView;

class RegistrationView extends PagesWithExceptionView
{
    public function renderContent()
    {
        return
            '<div class="authorization">
                <h1 class="">Registration</h1>
                '.$this->renderExceptionMessage().'
                <form name="Registration" class="authorForm" action="#" method="post">
                    <input type="text" placeholder="Enter your name" class="authorFormItem" required name="name" value="'.$this->model->userName.'">
                    <input type="text" placeholder="Enter your user name" class="authorFormItem" required name="login" value="'.$this->model->userLogin.'">
                    <input type="email" placeholder="Enter your email" class="authorFormItem" required name="email" value="'.$this->model->userEmail.'">
                    <input type="password" placeholder="Enter your password" class="authorFormItem" required name="password">
                    <input type="hidden" name="action_name" value="user_reg">
                    <button class="button authorFormItem" type="submit">Sign up</button>
                </form>
            </div>';
    }
}