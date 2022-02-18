<?php
namespace App\Pages\AdminPages\AdminControllers;

use App\Pages\AdminPages\AdminModels\UserChangeRoleModel;
use App\Pages\AdminPages\AdminViews\UserManagementPageView;
use App\Pages\AdminPages\AdminViews\AdminPagePaginationView;

class UserManagementPageController extends AdminController
{
    private $pageSize;

    public function __construct()
    {
        parent::__construct();
        $this->pageSize = 3;
    }

    public function userManagement()
    {
        $model = new UserChangeRoleModel($this->pageSize, $this->pageNumber);
        return new UserManagementPageView($model, new AdminPagePaginationView($this->pageSize, $this->pageNumber, $model->rowCount));
    }
}