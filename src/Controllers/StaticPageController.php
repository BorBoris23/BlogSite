<?php
namespace App\Controllers;

use App\Models\Post;
use App\View\View;

class StaticPageController
{
    public function about()
    {
        return new View('about', ['title' => 'About Page']);
    }

    public function posts()
    {
        return new View('posts.posts', ['posts' => Post::all()]);
    }
}
