<?php
namespace App\View;

use App\Exceptions\ApplicationException;

class View implements Rendering
{
    private string $view;
    private array $data;

    public function __construct($view, $data)
    {
        $this->view = VIEW_DIR . $view;
        $this->data = $data;
    }

    public function render()
    {
        $fileName = $this->getIncludeTemplate($this->view);
        if(!file_exists($fileName)) {
            throw new ApplicationException( $fileName . " шаблон не найден");
        }
        extract($this->data);
        require_once $fileName;
    }

    private function getIncludeTemplate($view): string
    {
        return str_replace(".", DIRECTORY_SEPARATOR, $view) . '.php';
    }
}
