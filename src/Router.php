<?php
namespace App;

use App\Exceptions\NotFoundException;

final class Router
{
    private static $instance;
    private array $routes = [];

    public function get(string $path, array $callback)
    {
        $this->addRoute('get', $path, $callback);
    }

    public function post(string $path, array $callback)
    {
        $this->addRoute('post', $path, $callback);
    }

    private function addRoute(string $method, string $path, array $callback)
    {
        $this->routes[] = new Route($method, $path, $callback);
    }

    public function dispatch(string $url, string $method)
    {
        $uri = trim($url, '/');
        foreach ($this->routes as $route) {
            if ($route->match($uri, strtolower($method))) {
                return $route->run($uri);
            }
        }
        throw new NotFoundException('Ошибка 404. Страница не найдена');
    }

    public static function getInstance() : Router
    {
        if(null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
