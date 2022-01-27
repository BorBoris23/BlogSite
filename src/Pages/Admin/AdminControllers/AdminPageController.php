<?php
namespace App\Pages\Admin\AdminControllers;

use App\Pages\Admin\AdminModel;
use App\Pages\Admin\AdminViews\AdminView;
use App\Pages\Admin\AdminViews\AdminPagePaginationView;

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
        $admin = new AdminView($adminModel, new AdminPagePaginationView($this->pageSize, $this->pageNumber, $adminModel->rowCount));
        return $admin->render();
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