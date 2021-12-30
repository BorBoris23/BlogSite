<?php
namespace App\Pages\Registration;

use App\View\PageView;

class RegistrationView extends PageView
{
    public function renderContent()
    {
        return
            '<h1 class="">Registration</h1>
            <form name="Registration" class="" action="#" method="post">
                <input type="text" placeholder="Enter your name" class="" required name="name">
                <input type="text" placeholder="Enter your user name" class="" required name="login">
                <input type="email" placeholder="Enter your email" class="" required name="email">
                <input type="password" placeholder="Enter your password" class="" required name="password">
                <input type="hidden" name="action_name" value="user_reg">
                <button class="button" type="submit">Sign up</button>
            </form>';
    }
}