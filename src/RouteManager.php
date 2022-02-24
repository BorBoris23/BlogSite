<?php
namespace App;

abstract class RouteManager
{
    public $router;

    public function __construct()
    {
        $this->router = Router::getInstance();
        $this->addRoute();
    }

   abstract public function addRoute();
}
