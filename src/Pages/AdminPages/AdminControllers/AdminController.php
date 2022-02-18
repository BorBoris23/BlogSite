<?php
namespace App\Pages\AdminPages\AdminControllers;

abstract class AdminController
{
    public $pageNumber;

    public function __construct()
    {
        $this->pageNumber = $this->gettingNumberPage();
    }

    private function gettingNumberPage()
    {
        if (array_key_exists('page', $_GET)) {
            $pageNumber = $_GET['page'];
            if (!is_numeric($pageNumber)) {
                $pageNumber = 1;
            }
        } else {
            $pageNumber = 1;
        }
        return $pageNumber;
    }
}
