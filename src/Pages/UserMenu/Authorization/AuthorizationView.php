<?php
namespace App\Pages\UserMenu\Authorization;

use App\Pages\PagesWithExceptionView;

class AuthorizationView extends PagesWithExceptionView
{
    public function renderContent()
    {
        return
            '<div class="authorization">
                <h1>Authorization</h1>
                '.$this->renderExceptionMessage().'
                <form class="authorForm" name="authorization" action="#" method="post">
                    <input type="text" placeholder="Enter your user name ore email" class="authorFormItem" required name="loginOreEmail" value="'.$this->model->userLogin.'">
                    <input type="password" placeholder="Enter your password" class="authorFormItem" required name="password">
                    <input type="hidden" name="action_name" value="user_auth">
                    <button class="button authorFormItem" type="submit">Sign up</button>
                </form>
            </div>';
    }
}

