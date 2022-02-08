<?php
namespace App\Pages\PostPage;

use App\Models\Post;
use App\Models\User;
use App\Pages\PageModel;

class PostPageModel extends PageModel
{
    public $post;
    public $currentUser;
    public $commentText;

    public function __construct($login)
    {
        $this->post = Post::where('id', '=', $login)->first();
        $this->currentUser = $User = User::where('email', '=', $_COOKIE['email'])->first();
    }
}
