<?php
namespace App\Pages;

use App\View\PageView;

abstract class PagesWithExceptionView extends PageView
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