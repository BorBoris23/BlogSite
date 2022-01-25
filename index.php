<?php
//use App\Router;
use App\Application;
//use App\RouteManager;


//use App\Pages\HomePage\HomePageController;
//
//use App\Pages\UserMenu\Authorization\AuthorizationPageController;
//use App\Pages\UserMenu\Authorization\AuthorizationController;
//use App\Pages\UserMenu\Authorization\LogAutController;
//use App\Pages\UserMenu\PersonalArea\PersonalAreaPageController;
//
//use App\Pages\UserMenu\Registration\RegistrationPageController;
//use App\Pages\UserMenu\Registration\RegistrationController;
//
//use App\Pages\Admin\AdminPageController;
//use App\pages\Admin\AdminController;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

//$router = Router::getInstance();




//$router = new Router();

//$router->get('', [HomePageController::class, 'index']);
//
//$router->get('authorization', [AuthorizationPageController::class, 'authorization']);
//$router->post('authorization', [AuthorizationController::class, 'doAuthorization']);
//$router->get('logAut', [LogAutController::class, 'logAut']);
//$router->get('personalArea', [PersonalAreaPageController::class, 'personalArea']);
//
//$router->get('registration', [RegistrationPageController::class, 'registration']);
//$router->post('registration', [RegistrationController::class, 'doRegistration']);
//
//$router->get('admin', [AdminPageController::class, 'admin']);
//$router->post('admin', [AdminController::class, 'changeUserRole']);

//$router->get('about', [StaticPageController::class, 'about']);

$application = new Application();

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);



