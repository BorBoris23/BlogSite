<?php
namespace App\Pages\WriteNewPost;

use App\Pages\PagesWithExceptionView;

class WriteNewPostView extends PagesWithExceptionView
{
    public function renderContent()
    {
        return '<form name="AddNewPost" class="" action="#" method="post" enctype="multipart/form-data">
                    '.$this->renderExceptionMessage().'
                    <div class="form-group">
                        <input type="text" placeholder="Write a title" class="writeTitle" required name="heading" value="'.$this->model->heading.'">
                    </div>
                    <div class="form-group">
                        <textarea rows="12" cols="173" name="content" required placeholder="Add new post">'.$this->model->content.'</textarea>
                    </div>
                    <div class="form-group">
                        <textarea rows="4" cols="173" name="description" required placeholder="Add short description">'.$this->model->shortDescription.'</textarea>
                    </div>
                    <div>
                        <label for="image_uploads"><img class="avatar" src="'.$this->model->pathToImg.'"></label>
                        <input type="file" id="image_uploads" name="postImg" accept=".jpg, .jpeg, .png" hidden>
                    </div>
                    <button type="submit" class="btn btn-primary btn-addNewImg">Add new post</button>
                </form>';
    }
}