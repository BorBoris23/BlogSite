<?php
namespace App\Pages\HomePage\HomePageControllers;

use App\Pages\HomePage\HomePageView;

class HomePageController
{
    public function index()
    {
        $HomePageView = new HomePageView(CheckCookieController::isCookie());
        return $HomePageView->render();
    }
}
