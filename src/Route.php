<?php
namespace App;

use Closure;

class Route
{
    private string $method;
    private string $path;
    private Closure $callback;

    public function __construct(string $method, string $path, array $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $this->prepareCallback($callback);
    }

    private function prepareCallback(array $callback): Closure
    {
        return function (...$params) use ($callback) {
            list($class, $method) = $callback;
            return (new $class)->{$method}(...$params);
        };
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function match(string $uri, string $method): bool
    {
        $uri = preg_replace('/\?.*/', '', $uri);
        return preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/',$uri) && $this->getMethod() === $method;
    }

    public function run(string $uri)
    {
        return call_user_func_array($this->callback, parse_url($uri));
    }
}
