<?php
namespace App\Pages\AdminPages\AdminModels;

use App\Models\PageModel;

class AdminModel extends PageModel
{
    public $limit;
    public $offset;

    public function __construct($pageSize, $pageNumber)
    {
        parent::__construct();
        $this->limit = $pageSize;
        $this->offset = ($pageNumber - 1) * $pageSize;
    }
}