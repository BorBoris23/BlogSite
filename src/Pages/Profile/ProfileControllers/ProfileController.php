<?php
namespace App\Pages\Profile\ProfileControllers;

use App\Pages\Profile\ProfileView;
use App\Pages\Profile\ProfileModel;

class ProfileController
{
    public function profile()
    {
        return new ProfileView(new ProfileModel($_GET['profileId']));
    }
}