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

    public function renderNavigation()
    {
        return '<div class="nav-scroller py-1 mb-2">
                        <nav class="nav d-flex justify-content-between">
                            <a class="p-2 link-secondary" href="/">Main</a>
                            '.$this->renderAdminItem().'
                            <a class="p-2 link-secondary" href="/rules">Rules</a>
                        </nav>
                    </div>';

    }

    private function renderAdminItem()
    {
        $result = '';
        if(!empty($this->model->currentUser)) {
            if($this->model->currentUser->login === 'SuperAdmin') {
                $result = '<a class="p-2 link-secondary" href="/admin">AdminPage</a>';
            }
        }
        return $result;
    }
}