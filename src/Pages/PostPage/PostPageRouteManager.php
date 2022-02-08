<?php
namespace App\Pages\PostPage;

use App\Pages\PostPage\PostPageControllers\PostPageController;
use App\Pages\PostPage\PostPageControllers\AddNewCommentController;
use App\RouteManager;

class PostPageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('post', [PostPageController::class, 'post']);
        $this->router->post('post', [AddNewCommentController::class, 'addNewComment']);
    }
}