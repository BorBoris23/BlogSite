<?php
namespace App\View;

class HomePageView extends PageView
{
    public $isLoggedIn;

    public function __construct($isLoggedIn)
    {
        $this->isLoggedIn = $isLoggedIn;
    }

    public function renderHeaderCol4()
    {
        return
            '<div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
                  ' . $this->renderAuthOreReg() . '  
            </div>';
    }

    private function renderAuthOreReg()
    {
        if($this->isLoggedIn) {
            return
                '<a class="btn btn-sm btn-outline-secondary" href="/logAut">Log out</a>';
        } else {
            return
                '<a class="btn btn-sm btn-outline-secondary" href="/registration">Sign up</a>
                <a class="btn btn-sm btn-outline-secondary" href="/authorization">Log in</a>';
        }
    }

}