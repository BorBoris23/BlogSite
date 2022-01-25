<?php
namespace App\Pages\UserMenu\PersonalArea;

class PersonalAreaPageController
{
    public function personalArea()
    {
        $personalArea = new PersonalAreaView(new PersonalAreaPageModel());
        return $personalArea->render();
    }
}
