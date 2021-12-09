<?php
use App\Application;
use App\Controllers\HomeController;
use App\Controllers\StaticPageController;
use App\Router;
use Illuminate\Database\Eloquent\Builder;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$router = new Router();

$router->get('', [HomeController::class, 'index']);
$router->get('about', [StaticPageController::class, 'about']);
$router->get('posts', [StaticPageController::class, 'posts']);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

//use Illuminate\Database\Capsule\Manager as Capsule;
//
//Capsule::schema()->create('users', function ($table) {
//    $table->increments('id');
//    $table->string('email')->unique();
//});

