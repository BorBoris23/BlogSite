<?php
namespace App\Pages\AdminPages\AdminControllers;

use App\Pages\AdminPages\AdminModels\CommentManagementModel;
use App\Pages\AdminPages\AdminViews\AdminPagePaginationView;
use App\Pages\AdminPages\AdminViews\CommentManagementPageView;


class CommentManagementPageController extends AdminController
{
    public $pageSize;

    public function __construct()
    {
        parent::__construct();
        $this->pageSize = 6;
    }

    public function commentManagement()
    {
        $model = new CommentManagementModel($this->pageSize, $this->pageNumber);
        return new CommentManagementPageView($model, new AdminPagePaginationView($this->pageSize, $this->pageNumber, $model->rowCount));
    }
}
