<?php
namespace App\Pages\Admin\AdminControllers\CommentManagementControllers;

use App\Models\Comment;

class CheckOreDeleteCommentController
{
    private $comment;

    public function __construct()
    {
        $this->comment = Comment::where('id', '=', $_POST['comment_id']);
    }

    public function checkComment()
    {
        $this->comment->update(['isChecked' => 1]);
        header("Location: #");
        die();
    }

    public function deleteComment()
    {
        $this->comment->delete();
        header("Location: #");
        die();
    }
}
