<?php
namespace App\Pages\Home;

use App\Models\PageModel;
use App\Models\Post;

class HomeModel extends PageModel
{
    public $posts;
    public $exception;
    public $titlePost;
    private $lastRecord;

    public function __construct()
    {
        parent::__construct();
        $this->posts = Post::all()->sortByDesc('created');
        $this->lastRecord = Post::where('published', '=', 1)->max('created');
        $this->titlePost = Post::where('created', '=', $this->lastRecord)->first();
    }
}
