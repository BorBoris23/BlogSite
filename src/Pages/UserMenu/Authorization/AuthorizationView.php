<?php
namespace App\Pages\UserMenu\Authorization;

use App\Pages\UserMenu\UserMenuView;

class AuthorizationView extends UserMenuView
{
    public function renderContent()
    {
        return
            '<h1 class="">Authorization</h1>
            '.$this->renderExceptionMessage().'
            <form name="authorization" class="" action="#" method="post">
                <input type="text" placeholder="Enter your user name ore email" class="" required name="loginOreEmail" value="'.$this->model->userLogin.'">
                <input type="password" placeholder="Enter your password" class="" required name="password">
                <input type="hidden" name="action_name" value="user_auth">
                <button class="button" type="submit">Sign up</button>
            </form>';
    }
}