<?php
namespace App\Pages\UserMenu\PersonalArea\PersonalAreaControllers;

use App\Pages\UserMenu\UserMenuModel;
use App\Pages\UserMenu\PersonalArea\PersonalAreaView;

class PersonalAreaController
{
    public function personalArea()
    {
        return new PersonalAreaView(new UserMenuModel());
    }
}
