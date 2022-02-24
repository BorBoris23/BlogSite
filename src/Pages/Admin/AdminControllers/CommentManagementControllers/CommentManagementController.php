<?php
namespace App\Pages\Admin\AdminControllers\CommentManagementControllers;

use App\Pages\Admin\AdminControllers\AdminController;
use App\Pages\Admin\AdminModels\CommentManagementModel;
use App\Pages\Admin\AdminViews\AdminPaginationView;
use App\Pages\Admin\AdminViews\CommentManagementView;


class CommentManagementController extends AdminController
{
    public function commentManagement()
    {
        $model = new CommentManagementModel($this->pageSize, $this->pageNumber);
        return new CommentManagementView($model, new AdminPaginationView($this->pageSize, $this->pageNumber, $model->rowCount));
    }
}
