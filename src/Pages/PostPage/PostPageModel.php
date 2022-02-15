<?php
namespace App\Pages\PostPage;

use App\Models\Post;
use App\Models\PageModel;

class PostPageModel extends PageModel
{
    public $post;
    public $commentText;

    public function __construct($login)
    {
        parent::__construct();
        $this->post = Post::where('id', '=', $login)->first();
//        $this->currentUser = $this->getCurrentUser();
    }
}
