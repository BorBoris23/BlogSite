<?php
namespace App;

use App\View\Rendering;
use App\Exceptions\ApplicationException;
use App\Exceptions\HttpException;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    public function run(string $url, string $method)
    {
        try {
            $result = $this->router->dispatch($url, $method);
            if ($result instanceof Rendering) {
                $result->render();
            } else {
                echo $result;
            }
        } catch (ApplicationException $e) {
            $this->renderException($e);
        }
    }

    private function renderException(ApplicationException $e)
    {
        if ($e instanceof Rendering) {
            $e->render();
        } else if ($e instanceof HttpException) {
           http_response_code(500);
           echo $e->getMessage();
        }
    }

    private function initialize()
    {
        $capsule = new Capsule;
        $dbConnect = Config::getInstance();
        $capsule->addConnection([
            'driver' => $dbConnect->getConfig('db.driver'),
            'host' => $dbConnect->getConfig('db.host'),
            'database' => $dbConnect->getConfig('db.dbname'),
            'username' => $dbConnect->getConfig('db.user'),
            'password' => $dbConnect->getConfig('db.password'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
