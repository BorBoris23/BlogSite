<?php
namespace App\Pages\Admin\AdminViews;

use App\View\PageView;

class MainAdminView extends PageView
{
    private $pageSize;

    public function __construct($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function renderContent()
    {
        return '<div>
                    <ul>
                        <li><a class="p-2 link-secondary" href="/userManagement?countItem='.$this->pageSize.'">User management</a></li>
                        <li><a class="p-2 link-secondary" href="/commentManagement?countItem='.$this->pageSize.'">Comment management</a></li>
                        <li><a class="p-2 link-secondary" href="/postManagement?countItem='.$this->pageSize.'">Post management</a></li>
                    </ul>
                </div>';
    }

    public function renderNavigation()
    {
        return '<div class="nav-scroller py-1 mb-2">
                        <nav class="nav d-flex justify-content-between">
                            <a class="p-2 link-secondary" href="/">Main</a>
                            <a class="p-2 link-secondary" href="/rules">Rules</a>
                        </nav>
                    </div>';

    }
}
