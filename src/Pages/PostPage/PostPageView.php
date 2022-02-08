<?php
namespace App\Pages\PostPage;

use App\Pages\PagesWithExceptionView;

class PostPageView extends PagesWithExceptionView
{
    private $post;
    private $comments;
    private $commentText;

    public function __construct($model)
    {
        parent::__construct($model);
        $this->post = $model->post;
        $this->comments = $this->post->comments;
        $this->commentText = $model->commentText;
    }

    public function renderContent()
    {
        return
            $this->renderPostBlock() .'
            <div class="container">
                <div class="row mb-2">
                    '.$this->renderCommentBlock().'
                 </div>
            </div>
            '.$this->renderAddNewCommentForm().'';
    }

    private function renderPostBlock()
    {
        return '
          <article class="blog-post">
            <h2 class="blog-post-title">'.$this->post->heading.'</h2>
            <p class="blog-post-meta">'.$this->post->created.'</p>
            <p>Author - '.$this->post->user->name.'</p>
            <img class="avatar" src="'.$this->post->user->pathToAvatar.' ">
            <p>'.$this->post->content.'</p>
            <hr>
          </article>';
    }

    private function renderCommentBlock()
    {
        $result = '';
        foreach ($this->comments as $comment) {
            $author = $comment->user;
            if($comment->isChecked) {
                $result .= '
                <div class="col-md-2">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <p class="mb-auto">'.$comment->content.'</p>
                            <div class="mb-1 text-muted">'.$author->name.'</div>
                            <div class="mb-1 text-muted">'.$comment->created.'</div>
                        </div>
                    </div>
                </div>';
            }
        }
        return $result;
    }

    private function renderAddNewCommentForm()
    {
        return '
            <form name="AddComment" class="" action="#" method="post">
            '.$this->renderExceptionMessage().'
                <div class="form-group">
                    <textarea rows="3" cols="30" name="message" placeholder="Add comment" >'.$this->commentText.'</textarea>
                </div>
               <button type="submit" class="btn btn-primary">Add comment</button>
            </form>';
    }
}


