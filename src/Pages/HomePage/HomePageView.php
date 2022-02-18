<?php
namespace App\Pages\HomePage;

use App\Pages\PagesWithExceptionView;

class HomePageView extends PagesWithExceptionView
{
    public $isLoggedIn;

    public function __construct($isLoggedIn, $model)
    {
        parent::__construct($model);
        $this->isLoggedIn = $isLoggedIn;
        $this->model = $model;
    }

    public function renderUsersMenu()
    {
        return
            '<div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
                  '.( ($this->isLoggedIn) ? '<a class="btn btn-sm btn-outline-secondary" href="/logAut">Log out</a>
                    <a class="btn btn-sm btn-outline-secondary" href="/personalArea">Personal Area</a>' :
                    '<a class="btn btn-sm btn-outline-secondary" href="/registration">Sign up</a>
                    <a class="btn btn-sm btn-outline-secondary" href="/authorization">Log in</a>').'   
            </div>';
    }

    public function renderContent()
    {
        return '<main class="container">
                    <div class="row mb-2">
                        '.$this->renderTitularBlock().
                        $this->renderPostsBlock().'
                    </div>
                </main>';
    }

    private function renderTitularBlock()
    {
        return '<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
                    </div>
                </div>';
    }

    private function renderPostsBlock()
    {
        $result = '';
        foreach ($this->model->posts as $post)
        {
            $result .= '
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">'.$post['heading'].'</h3>
                            <p class="card-text mb-auto">'.$post['shortDescription'].'</p>
                            <div class="mb-1 text-muted">'.$post['created'].'</div>
                            <strong class="d-inline-block mb-2">
                                '.( ($this->isLoggedIn) ? '<a href="/profile?profileId='.$post->user->id.'">'.$post->user->name.'</a>' : '<p>'.$post->user->name.'</p>').'     
                            </strong>
                            '.( ($this->isLoggedIn) ? '<a href="/post?postId='.$post['id'].'">go to reading</a>' : '').'    
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="'.$post['pathToPictures'].'" width="200" height="250">
                        </div>
                    </div>
                </div>';
        }
        return $result;
    }
}
