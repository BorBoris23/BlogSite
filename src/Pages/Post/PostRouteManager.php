<?php
namespace App\Pages\Post;

use App\Pages\Post\PostControllers\PostController;
use App\Pages\Post\PostControllers\AddNewCommentController;
use App\RouteManager;

class PostRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('post', [PostController::class, 'post']);
        $this->router->post('post', [AddNewCommentController::class, 'addNewComment']);
    }
}