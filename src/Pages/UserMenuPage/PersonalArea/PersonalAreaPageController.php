<?php
namespace App\Pages\UserMenuPage\PersonalArea;

class PersonalAreaPageController
{
    public function personalArea()
    {
        return new PersonalAreaView(new PersonalAreaPageModel());
    }
}
