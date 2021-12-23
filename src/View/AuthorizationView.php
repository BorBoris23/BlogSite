<?php
namespace App\View;

class AuthorizationView extends PageView
{
    public function renderContent()
    {
        return
            '<h1 class="">Authorization</h1>
            <form name="authorization" class="" action="#" method="post">
                <input type="text" placeholder="Enter your user name ore email" class="" required name="loginOreEmail">
                <input type="password" placeholder="Enter your password" class="" required name="password">
                <input type="hidden" name="action_name" value="user_auth">
                <button class="button" type="submit">Sign up</button>
            </form>';
    }
}