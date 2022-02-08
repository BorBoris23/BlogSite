<?php
namespace App\Pages\HomePage;
use App\Models\Post;

class HomePageModel
{
    public $posts;

    public function __construct()
    {
        $this->posts = Post::all()->sortByDesc('created');
    }
}
