<?php
namespace App\Pages\UserMenuPages\PersonalArea\PersonalAreaControllers;

use App\Pages\UserMenuPages\UserMenuPageModel;
use App\Pages\UserMenuPages\PersonalArea\PersonalAreaView;

class PersonalAreaPageController
{
    public function personalArea()
    {
        return new PersonalAreaView(new UserMenuPageModel());
    }
}
