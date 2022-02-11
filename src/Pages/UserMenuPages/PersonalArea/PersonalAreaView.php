<?php
namespace App\Pages\UserMenuPages\PersonalArea;

use App\Pages\PagesWithExceptionView;

class PersonalAreaView extends PagesWithExceptionView
{
    private $currentUser;

    public function __construct($model)
    {
        parent::__construct($model);
        $this->currentUser = $model->getCurrentUser();
    }


    public function renderContent()
    {
        return '
            <div class="container">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">My personal data</h4>
                        '.$this->renderExceptionMessage().'
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="UserName" class="form-label">User name</label>
                                    <input type="text" name="name" class="form-control" value="'.$this->currentUser->name.'" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="UserLogin" class="form-label">User login</label>
                                    <input type="text" name="login" class="form-control"  value="'.$this->currentUser->login.'" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                        
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="'.$this->currentUser->email.'">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                                <div class="aboutMe">
                                    <div>
                                        <label for="image_uploads"><img class="avatar" src="'.$this->currentUser->pathToAvatar.' "></label>
                                        <input type="file" id="image_uploads" name="avatarImg" accept=".jpg, .jpeg, .png" hidden>
                                    </div>
                                    <div class="aboutMeText">
                                        <textarea rows="3" cols="30" name="aboutMe" placeholder="Add comment" >'.$this->currentUser->aboutMe.'</textarea>
                                    </div>
                                </div>
                            
                            <div class="col-12">
                                <label for="address" class="form-label">Password</label>
                                <input type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>';
    }
}