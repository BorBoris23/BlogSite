<?php
namespace App\Pages\ProfilePage\ProfilePageControllers;

use App\Pages\ProfilePage\ProfilePageView;
use App\Pages\ProfilePage\ProfilePageModel;

class ProfilePageController
{
    public function profile()
    {
        return new ProfilePageView(new ProfilePageModel($_GET['profileId']));
    }
}