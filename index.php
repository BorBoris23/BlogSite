<?php
use App\Application;
use App\Controllers\HomeController;
use App\Controllers\StaticPageController;
use App\Controllers\RegistController;
use App\Controllers\AuthorController;
use App\Controllers\LogAutControllers;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$router = new Router();

$router->get('', [HomeController::class, 'index']);
$router->get('about', [StaticPageController::class, 'about']);
$router->get('registration', [StaticPageController::class, 'registration']);
$router->post('registration', [RegistController::class, 'doRegistration']);
$router->get('authorization', [StaticPageController::class, 'authorization']);
$router->post('authorization', [AuthorController::class, 'doAuthorization']);
$router->get('logAut', [LogAutControllers::class, 'logAut']);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


