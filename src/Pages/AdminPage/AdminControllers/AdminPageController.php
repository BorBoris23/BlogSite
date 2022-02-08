<?php
namespace App\Pages\AdminPage\AdminControllers;

use App\Pages\AdminPage\AdminModel;
use App\Pages\AdminPage\AdminViews\AdminView;
use App\Pages\AdminPage\AdminViews\AdminPagePaginationView;

class AdminPageController
{
    public $pageNumber;
    public $pageSize;

    public function __construct()
    {
        $this->pageNumber = $this->gettingNumberPage();
        $this->pageSize = 3;
    }

    public function admin()
    {
        $adminModel = new AdminModel($this->pageSize, $this->pageNumber);
        return new AdminView($adminModel, new AdminPagePaginationView($this->pageSize, $this->pageNumber, $adminModel->rowCount));
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