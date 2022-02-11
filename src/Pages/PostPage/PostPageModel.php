<?php
namespace App\Pages\PostPage;

use App\Models\Post;
use App\Pages\PageModel;

class PostPageModel extends PageModel
{
    public $post;
    public $commentText;

    public function __construct($login)
    {
        $this->post = Post::where('id', '=', $login)->first();
        $this->currentUser = $this->getCurrentUser();
    }
}
