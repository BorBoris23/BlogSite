<?php
namespace App\Pages\UserMenu;

use App\View\PageView;

class UserMenuView extends PageView
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