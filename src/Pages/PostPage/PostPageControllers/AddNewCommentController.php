<?php
namespace App\Pages\PostPage\PostPageControllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\CommentTooLongException;
use App\Pages\PostPage\PostPageModel;
use App\Models\Comment;
use App\Pages\PostPage\PostPageView;

class  AddNewCommentController
{
    private $postPageModel;
    private $currentUser;
    private $currentPost;

    public function __construct()
    {
        $this->postPageModel = new PostPageModel($_GET['postId']);
        $this->currentUser = $this->postPageModel->currentUser;
        $this->currentPost = $this->postPageModel->post;
    }

    public function addNewComment()
    {
        try {
            $table = new Comment();
            $table->content = $this->commentLengthChecker();
            $table->user_id = $this->currentUser->id;
            $table->post_id = $this->currentPost->id;
            $table->isChecked = 0;
            $table->save();
            header("Location: #");
            die();
        } catch (ApplicationException $e) {
            $this->postPageModel->exception = $e;
            $this->postPageModel->commentText = $_POST['message'];
            return new PostPageView($this->postPageModel);
        }
    }

    private function commentLengthChecker()
    {
        if(strlen($_POST['message']) > 50) {
            throw new CommentTooLongException('Comment is too long');
        } else {
            return $_POST['message'];
        }
    }
}
