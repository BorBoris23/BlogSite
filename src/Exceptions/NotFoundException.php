<?php
namespace App\Exceptions;

use App\View\View;

class NotFoundException extends HttpException
{
    public function render()
    {
        header("HTTP/1.0 404 Not Found", true, 404);
        $view = new View('errors.error', ['message' => $this->getMessage()]);
    }
}
