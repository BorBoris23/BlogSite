<?php
namespace App\Controllers;

use App\View\HomePageView;
//use App\View\View;

class HomeController
{
    public function index()
    {
//        return new View('homepage', ['title' => 'Index Page']);
        $HomePageView = new HomePageView(CheckCookieController::isCookie());
        return $HomePageView->render();
    }
}
