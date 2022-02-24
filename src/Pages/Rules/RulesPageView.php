<?php
namespace App\Pages\Rules;

use App\View\PageView;

class RulesPageView extends PageView
{
    public function renderHeader()
    {
        return
            '<header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-12 text-center">
                        <a class="blog-header-logo text-dark">My first BlogSite</a>
                    </div>
                </div>
            </header>';
    }

    public function renderContent()
    {
        return '
                <main class="col-12 text-center">
                    <h1>Rules of conduct on the site</h1>
                    <li>
                        1 rule
                    </li>
                    <li>
                        2 rule
                    </li>
                    <li>
                        3 rule
                    </li>
                    <li>
                        4 rule
                    </li>
                    <li>
                        5 rule
                    </li>
                    <li>
                        6 rule
                    </li>
                    <a class="p-2 link-secondary" href="/">I agree</a>
                </main>';
    }
}

