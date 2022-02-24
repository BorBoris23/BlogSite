<?php
namespace App\Pages\WriteNewPost\WriteNewPostControllers;

use App\Pages\WriteNewPost\WriteNewPostView;
use App\Pages\WriteNewPost\WriteNewPostModel;

class WriteNewPostPageController
{
    public function writeNewPost()
    {
        return new WriteNewPostView(new WriteNewPostModel());
    }
}