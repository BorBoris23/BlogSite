<?php
namespace App\Pages\UsersMenu\PersonalArea;

class PersonalAreaPageController
{
    public function personalArea()
    {
        $personalArea = new PersonalAreaView(new PersonalAreaPageModel());
        return $personalArea->render();
    }
}
