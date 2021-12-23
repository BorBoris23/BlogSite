<?php
namespace App\Controllers;

use App\View\AuthorizationView;
use App\View\RegistrationView;
use App\View\View;

class StaticPageController
{
    public function about()
    {
        return new View('about', ['title' => 'About Page']);
    }

    public function registration()
    {
//        return new View('registration', ['title' => 'Registration']);
        $authorization = new RegistrationView();
        return $authorization->render();
    }

    public function authorization()
    {
//        return new View('authorization', ['title' => 'Authorization']);
        $authorization = new AuthorizationView();
        return $authorization->render();
    }

//    public function posts()
//    {
//        return new View('posts.posts', ['posts' => Post::all()]);
//    }
}
