<?php
namespace App\Pages\AdminPages\AdminViews;

use App\View\PageView;

class MainAdminView extends PageView
{
    public function renderContent()
    {
        return '<div>
                    <ul>
                        <li><a class="p-2 link-secondary" href="/userManagement">User management</a></li>
                        <li><a class="p-2 link-secondary" href="/commentManagement">Comment management</a></li>
                        <li><a class="p-2 link-secondary" href="/">Main</a></li>
                        <li><a class="p-2 link-secondary" href="/">Main</a></li>
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