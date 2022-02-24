<?php
namespace App\Pages\Post\PostControllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\CommentTooLongException;
use App\Pages\Post\PostModel;
use App\Models\Comment;
use App\Pages\Post\PostView;

class AddNewCommentController
{
    private $model;
    private $currentUser;
    private $currentPost;

    public function __construct()
    {
        $this->model = new PostModel($_GET['postId']);
        $this->currentUser = $this->model->currentUser;
        $this->currentPost = $this->model->post;
    }

    public function addNewComment()
    {
        try {
            $comment = new Comment();
            $comment->content = $this->commentLengthChecker();
            $comment->user_id = $this->currentUser->id;
            $comment->post_id = $this->currentPost->id;
            $comment->isChecked = 0;
            $comment->save();
            header("Location: #");
            die();
        } catch (ApplicationException $e) {
            $this->model->exception = $e;
            $this->model->commentText = $_POST['message'];
            return new PostView($this->model);
        }
    }

    private function commentLengthChecker()
    {
        if (mb_strlen($_POST['message'], 'UTF-8') > 50) {
            throw new CommentTooLongException('Comment is too long');
        } else {
            return $_POST['message'];
        }
    }
}
