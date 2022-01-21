<?php
namespace App\Pages\UsersMenu;

use App\View\PageView;

class UsersMenuView extends PageView
{
    public $model;
    public $exception;

    public function __construct($model)
    {
        $this->model = $model;
        $this->exception = $this->model->exception;
    }

    public function renderExceptionMessage()
    {
        $result = '';
        if($this->exception !== null) {
            $result = '<div>'.$this->exception->getMessage().'</div>';
        }
        return $result;
    }
}