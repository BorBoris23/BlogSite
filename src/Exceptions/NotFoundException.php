<?php
namespace App\Exceptions;

use App\View\Rendering;
use App\View\View;

class NotFoundException extends HttpException implements Rendering
{
    public function render()
    {
        header("HTTP/1.0 404 Not Found", true, 404);
        $view = new View('errors.error', ['message' => $this->getMessage()]);
        $view->render();
    }
}
