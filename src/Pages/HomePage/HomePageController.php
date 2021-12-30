<?php
namespace App\Pages\HomePage;

class HomePageController
{
    public function index()
    {
        $HomePageView = new HomePageView(CheckCookieController::isCookie());
        return $HomePageView->render();
    }
}
