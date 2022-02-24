<?php
namespace App\Pages\Post;

use App\Models\Post;
use App\Models\PageModel;

class PostModel extends PageModel
{
    public $post;
    public $commentText;
    public $exception;

    public function __construct($postId)
    {
        parent::__construct();
        $this->post = Post::where('id', '=', $postId)->first();
    }
}
