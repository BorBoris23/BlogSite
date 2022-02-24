<?php
namespace App\Pages\Post\PostControllers;

use App\Pages\Post\PostModel;
use App\Pages\Post\PostView;

class PostController
{
    public function post()
    {
        return new PostView(new PostModel($_GET['postId']));
    }
}