<?php
namespace App\Pages\UserMenuPages\PersonalArea\PersonalAreaControllers;

use App\Exceptions\TooLongTextException;
use App\Models\User;
use App\Exceptions\DuplicateUserNameException;
use App\Exceptions\ApplicationException;
use App\Exceptions\FileSizeIsTooBigException;
use App\Exceptions\FileUploadException;
use App\Exceptions\WrongFileTypeException;
use App\Pages\UserMenuPages\PersonalArea\PersonalAreaView;
use App\Pages\UserMenuPages\UserMenuPageModel;

class PersonalAreaController
{
    private $model;
    private $currentUser;

    public function __construct()
    {
        $this->model = new UserMenuPageModel();
        $this->currentUser = $this->model->getCurrentUser();
    }

    public function upDate()
    {
        try {
            $this->currentUser->name = $_POST['name'];
            $this->currentUser->login = $this->checkingUserLoginForDuplicate();
            $this->currentUser->email = $_POST['email'];
            $this->currentUser->aboutMe = $this->checkingAboutMeText();
            $this->currentUser->pathToAvatar = $this->checkingFile();
            if(!empty($_FILES['avatarImg']['name'])) {
                $this->uploadFile();
            }
            $this->currentUser->save();
            header("Location: #");
            die();
        } catch (ApplicationException $e) {
            $this->model->exception = $e;
            $this->model->userName = $_POST['name'];
            $this->model->userLogin = $_POST['login'];
            $this->model->userEmail = $_POST['email'];
            return new PersonalAreaView($this->model);
        }
    }

    private function checkingAboutMeText()
    {
        if(str_word_count($_POST['aboutMe']) > 5) {
            throw new TooLongTextException('Too long text. The text should not exceed 25 words');
        } else {
            return $_POST['aboutMe'];
        }
    }

    private function checkingUserLoginForDuplicate()
    {
        $newUserLogin =  $_POST['login'];

        if($newUserLogin !== $this->currentUser->name) {
            $User = User::where('login', '=', $_POST['login'])->first();
            if($User !== null) {
                throw new DuplicateUserNameException('User with the same name already exists');
            }
        }
        return $newUserLogin;
    }

    private function checkingFile()
    {
        $newAvatarImgPath = $this->currentUser->pathToAvatar;
        if(!empty($_FILES['avatarImg']['name'])) {
            $this->fileValidation();
            $newAvatarImgPath = 'img/users-avatars/' . $_FILES['avatarImg']['name'];
        }
        return $newAvatarImgPath;
    }

    private function fileValidation()
    {
        if( (in_array($_FILES['avatarImg']['type'],fileRequirements['type']['jpg'])) || (in_array($_FILES['avatarImg']['type'],fileRequirements['type']['jpeg'])) ) {
            if($_FILES['avatarImg']['size'] > fileRequirements['size']) {
                throw new FileSizeIsTooBigException('File size is too big. Required file size - 2 Mb');
            }
        } else {
            throw new WrongFileTypeException('wrong file type. Required file type - jpg');
        }
    }

    private function uploadFile()
    {
        if(!empty($_FILES['avatarImg']['error'])) {
            throw new FileUploadException('file upload error');
        }
        $origFileName = $_FILES['avatarImg']['name'];
        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '\\img\users-avatars\\';
        $target = $uploadPath . basename($origFileName);
        $tmp = $_FILES['avatarImg']['tmp_name'];
        move_uploaded_file($tmp, $target);
    }
}
