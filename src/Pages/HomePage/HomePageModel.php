<?php
namespace App\Pages\HomePage;
use App\Models\PageModel;
use App\Models\Post;

class HomePageModel extends PageModel
{
    public $posts;
    public $exception;

    public function __construct()
    {
        parent::__construct();
        $this->posts = Post::all()->sortByDesc('created');
    }
}
