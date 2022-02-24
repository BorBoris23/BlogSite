<?php
namespace App\Pages\WriteNewPost\WriteNewPostControllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\FileSizeIsTooBigException;
use App\Exceptions\FileUploadException;
use App\Exceptions\TooLongTextException;
use App\Exceptions\WrongFileTypeException;
use App\Pages\WriteNewPost\WriteNewPostModel;
use App\Models\Post;
use App\Pages\WriteNewPost\WriteNewPostView;

class WriteNewPostController
{
    private $model;

    public function __construct()
    {
        $this->model = new WriteNewPostModel();
    }

    public function writeNewPost()
    {
        try {
            $post = new Post;
            $post->heading = $this->checkText(15, $_POST['heading']);
            $post->content = $this->checkText(255, $_POST['content']);
            $post->shortDescription = $this->checkText(50, $_POST['description']);
            $post->user_id = $this->model->currentUser->id;
            if(!empty($_FILES['postImg']['name'])) {
                $this->uploadFile();
                $post->pathToImg = $this->checkingFile();
            } else {
                $post->pathToImg = 'img/users-avatars/unknown.jpg';
            }
            $post->published = 0;
            $post->save();
            header("Location: /");
            die();
        } catch (ApplicationException $e) {
            $this->model->exception = $e;
            $this->model->heading = $_POST['heading'];
            $this->model->content = $_POST['content'];
            return new WriteNewPostView($this->model);
        }
    }

    private function checkText($limitWords, $text)
    {
        if(str_word_count($_POST['heading']) > $limitWords) {
            throw new TooLongTextException('Too long text. The text should not exceed '.$limitWords.' words');
        } else {
            return $text;
        }
    }

    private function checkingFile()
    {
        $this->fileValidation();
        return 'img/posts-img/' . $_FILES['postImg']['name'];
    }

    private function fileValidation()
    {
        if( (in_array($_FILES['postImg']['type'],fileRequirements['type']['jpg'])) || (in_array($_FILES['postImg']['type'],fileRequirements['type']['jpeg'])) ) {
            if($_FILES['postImg']['size'] > fileRequirements['size']) {
                throw new FileSizeIsTooBigException('File size is too big. Required file size - 2 Mb');
            }
        } else {
            throw new WrongFileTypeException('wrong file type. Required file type - jpg');
        }
    }

    private function uploadFile()
    {
        if(!empty($_FILES['postImg']['error'])) {
            throw new FileUploadException('file upload error');
        }
        $origFileName = $_FILES['postImg']['name'];
        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '\\img\posts-img\\';
        $target = $uploadPath . basename($origFileName);
        $tmp = $_FILES['postImg']['tmp_name'];
        move_uploaded_file($tmp, $target);
    }
}