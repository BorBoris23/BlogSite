<?php
namespace App\Pages\WriteNewPost;

use App\Pages\WriteNewPost\WriteNewPostControllers\WriteNewPostPageController;
use App\Pages\WriteNewPost\WriteNewPostControllers\WriteNewPostController;
use App\RouteManager;

class WriteNewPostRoteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('writeNewPost', [WriteNewPostPageController::class, 'writeNewPost']);
        $this->router->post('writeNewPost', [WriteNewPostController::class, 'writeNewPost']);
    }
}