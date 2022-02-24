<?php
namespace App\Pages\Admin\AdminViews;

use App\Pages\PagesWithExceptionView;

class PostManagementView extends PagesWithExceptionView
{
    private $pagination;
    private $pageName;

    public function __construct($model, $pagination)
    {
        parent::__construct($model);
        $this->pageName = '/userManagement';
        $this->pagination = $pagination;
    }

    public function renderContent()
    {
        $result = '';
        foreach ($this->model->posts as $post) {
            $result .= '<div class="mb-1 text-muted">'.$post->user->name.'</div>
                        <div class="mb-1 text-muted">created - '.$post->created.'</div>
                        <form name="published" action="#" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="post_id" value="'.$post->id.'">
                            <input type="hidden" name="author_id" value="'.$post->user->id.'">
                            <input type="hidden" name="action_name" value="published">
                            <div class="form-group">
                                <input type="text" class="writeTitle" required name="heading" value="'.$post->heading.'">
                            </div>
                            <div class="form-group">
                                <textarea rows="12" cols="173" name="content" required placeholder="Add new post">'.$post->content.'</textarea>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" cols="173" name="description" required placeholder="Add short description">'.$post->shortDescription.'</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-addNewImg">Publish post</button>
                        </form>';
        }
        return $result;
    }
}

