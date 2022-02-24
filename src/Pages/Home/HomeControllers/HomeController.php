<?php
namespace App\Pages\Home\HomeControllers;

use App\Pages\Home\HomeModel;
use App\Pages\Home\HomeView;

class HomeController
{
    public function index()
    {
        return new HomeView(CheckCookieController::isCookie(), new HomeModel());
    }
}
