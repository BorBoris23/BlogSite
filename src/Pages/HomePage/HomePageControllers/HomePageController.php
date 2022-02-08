<?php
namespace App\Pages\HomePage\HomePageControllers;

use App\Pages\HomePage\HomePageModel;
use App\Pages\HomePage\HomePageView;

class HomePageController
{
    public function index()
    {
        return new HomePageView(CheckCookieController::isCookie(), new HomePageModel());
    }
}
