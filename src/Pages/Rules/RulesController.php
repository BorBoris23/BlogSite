<?php
namespace App\Pages\Rules;

class RulesController
{
    public function rules()
    {
        return new RulesPageView();
    }
}
