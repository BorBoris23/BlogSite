<?php
namespace App\Pages\Admin\AdminViews;

use App\Pages\PagesWithExceptionView;

class CommentManagementView extends PagesWithExceptionView
{
    private $pagination;
    private $comments;
    private $pageName;

    public function __construct($model, $pagination)
    {
        parent::__construct($model);
        $this->pageName = '/commentManagement';
        $this->pagination = $pagination;
        $this->model = $model;
        $this->comments = $model->comments;
    }

    public function renderContent()
    {
        return '<div class="container">
                    <div class="row mb-2">
                        '.$this->renderCommentBlock().'
                     </div>
                     '.$this->pagination->renderUmPagination($this->pageName).'
                </div>';
    }

    private function renderCommentBlock()
    {
        $result = '';
        foreach ($this->comments as $comment) {
                $result .= '
                <div class="col-md-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <p class="mb-auto">'.$comment->content.'</p>
                            <div class="mb-1 text-muted">'.$comment->user->name.'</div>
                            <div class="mb-1 text-muted">'.$comment->created.'</div>
                            <div class="checkCommentForm">
                                <form name="checkComment" class="subscription" action="#" method="post">
                                    <input type="hidden" name="comment_id" value="'.$comment->id.'">
                                    <input type="hidden" name="action_name" value="checkComment">
                                    <button id="checkComment" type="submit" class="btn btn-primary">Check comment</button>
                                </form>
                                <form name="checkComment" class="subscription deleteComment" action="#" method="post">
                                    <input type="hidden" name="comment_id" value="'.$comment->id.'">
                                    <input type="hidden" name="action_name" value="deleteComment">
                                    <button id="deleteComment" type="submit" class="btn btn-primary">Delete comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        return $result;
    }

}
