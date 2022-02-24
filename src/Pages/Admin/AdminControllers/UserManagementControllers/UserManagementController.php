<?php
namespace App\Pages\Admin\AdminControllers\UserManagementControllers;

use App\Pages\Admin\AdminControllers\AdminController;
use App\Pages\Admin\AdminModels\UserChangeRoleModel;
use App\Pages\Admin\AdminViews\UserManagementView;
use App\Pages\Admin\AdminViews\AdminPaginationView;

class UserManagementController extends AdminController
{
    public function userManagement()
    {
        $model = new UserChangeRoleModel($this->pageSize, $this->pageNumber);
        return new UserManagementView($model, new AdminPaginationView($this->pageSize, $this->pageNumber, $model->rowCount));
    }
}
