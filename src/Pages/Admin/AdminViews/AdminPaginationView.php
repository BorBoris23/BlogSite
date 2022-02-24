<?php
namespace App\Pages\Admin\AdminViews;

class AdminPaginationView
{
    private $pageSize;
    private $pageNumber;
    private $rowCount;

    public function __construct($pageSize, $pageNumber, $rowCount)
    {
       $this->pageSize = $pageSize;
       $this->pageNumber = $pageNumber;
       $this->rowCount = $rowCount;
    }

    public function renderUmPagination($pageName)
    {
        $isPrevDisabled = ($this->pageNumber == 1);
        $isNextDisabled = ($this->gettingCountPages() == $this->pageNumber);
        return '<nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item ' . ($isPrevDisabled ? 'disabled' : '') . ' ">
                            <a class="page-link" href="'.$pageName.'?page=' . ($this->pageNumber - 1) . '" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        ' .$this->renderUmPaginationItems($pageName) . '
                        <li class="page-item ' . ($isNextDisabled ? 'disabled' : '') . ' ">
                            <a class="page-link" href="'.$pageName.'?page=' . ($this->pageNumber + 1) . '" tabindex="+1" aria-disabled="true">Next</a>
                        </li>
                    </ul>
                </nav>';
    }

    private function renderUmPaginationItems($pageName)
    {
        $result = '';
        for ($pageNumber = 1; $pageNumber <= $this->gettingCountPages(); $pageNumber++) {
            $isCurrentPage = ($pageNumber === $this->pageNumber);
            $result .= '<li class="page-item ' . ($isCurrentPage ? 'active' : '') . '"><a class="page-link" href="'.$pageName.'?page=' . $pageNumber . '">' . $pageNumber . '</a></li>';
        }
        return $result;
    }

    private function gettingCountPages()
    {
        $numberPages = ($this->rowCount / $this->pageSize);
        if (is_int($numberPages) !== true) {
            $pageCount = ceil($numberPages);
        } else {
            $pageCount = $numberPages;
        }
        return $pageCount;
    }
}
