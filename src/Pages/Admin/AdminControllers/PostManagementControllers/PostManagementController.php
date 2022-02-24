<?php
namespace App\Pages\Admin\AdminControllers\PostManagementControllers;

use App\Pages\Admin\AdminViews\AdminPaginationView;
use App\Pages\Admin\AdminControllers\AdminController;
use App\Pages\Admin\AdminModels\PostManagementModel;
use App\Pages\Admin\AdminViews\PostManagementView;

class PostManagementController extends AdminController
{
    public function postManagement()
    {
        $model = new PostManagementModel($this->pageSize, $this->pageNumber);
        return new PostManagementView($model, new AdminPaginationView($this->pageSize, $this->pageNumber, $model->rowCount));
    }
}
