<?php
namespace App\Pages\Admin\AdminModels;

use App\Models\Post;

class PostManagementModel extends AdminModel
{
    public $rowCount;
    public $posts;

    public function __construct($pageSize, $pageNumber)
    {
        parent::__construct($pageSize, $pageNumber);
        $this->posts = Post::where('published', '=', '0')
            ->offset($this->offset)
            ->limit($this->limit)
            ->get();;
        $this->rowCount = Post::all()->count();
    }
}
