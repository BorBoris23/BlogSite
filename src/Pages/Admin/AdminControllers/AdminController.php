<?php
namespace App\Pages\Admin\AdminControllers;

abstract class AdminController
{
    public $pageNumber;
    public $pageSize;

    public function __construct()
    {
        $this->pageNumber = $this->gettingNumberPage();
        $this->pageSize = $this->countItemsToLoad();
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

    private function countItemsToLoad()
    {
        if (array_key_exists('countItem', $_GET)) {
            $countItem = $_GET['countItem'];
            if (!is_numeric($countItem)) {
                $countItem = 3;
            }
        } else {
            $countItem = 3;
        }
        return $countItem;
    }
}
