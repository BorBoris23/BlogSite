<?php
namespace App\Pages\RulesPage;

class RulesPageController
{
    public function rules()
    {
        return new RulesPageView();
    }
}
