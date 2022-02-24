<?php
namespace App\Pages\Admin\AdminModels;

use App\Models\Comment;

class CommentManagementModel extends AdminModel
{
    public $comments;
    public $rowCount;

    public function __construct($pageSize, $pageNumber)
    {
        parent::__construct($pageSize, $pageNumber);
        $this->rowCount = Comment::all()->count();
        $this->comments = Comment::where('isChecked', '=', '0')
            ->offset($this->offset)
            ->limit($this->limit)
            ->get();
    }
}
