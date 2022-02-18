<?php
namespace App\Pages;

use App\View\PageView;

abstract class PagesWithExceptionView extends PageView
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function renderExceptionMessage()
    {
        $result = '';
        if($this->model->exception !== null) {
            $result = '<div>'.$this->model->exception->getMessage().'</div>';
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
                $result = '<a class="p-2 link-secondary" href="/admin">AdminPages</a>';
            }
        }
        return $result;
    }
}