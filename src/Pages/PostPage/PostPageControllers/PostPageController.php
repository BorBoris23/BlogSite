<?php
namespace App\Pages\PostPage\PostPageControllers;

use App\Pages\PostPage\PostPageModel;
use App\Pages\PostPage\PostPageView;
class PostPageController
{
    public function post()
    {
        return new PostPageView(new PostPageModel($_GET['postId']));
    }
}