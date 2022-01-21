<?php
use App\Router;
use App\Application;
use App\Pages\HomePage\HomePageController;

use App\Pages\UsersMenu\Authorization\AuthorizationPageController;
use App\Pages\UsersMenu\Authorization\AuthorizationController;
use App\Pages\UsersMenu\Authorization\LogAutController;
use App\Pages\UsersMenu\PersonalArea\PersonalAreaPageController;

use App\Pages\UsersMenu\Registration\RegistrationPageController;
use App\Pages\UsersMenu\Registration\RegistrationController;

use App\Pages\Admin\AdminPageController;
use App\pages\Admin\AdminController;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$router = new Router();

$router->get('', [HomePageController::class, 'index']);

$router->get('authorization', [AuthorizationPageController::class, 'authorization']);
$router->post('authorization', [AuthorizationController::class, 'doAuthorization']);
$router->get('logAut', [LogAutController::class, 'logAut']);
$router->get('personalArea', [PersonalAreaPageController::class, 'personalArea']);

$router->get('registration', [RegistrationPageController::class, 'registration']);
$router->post('registration', [RegistrationController::class, 'doRegistration']);

$router->get('admin', [AdminPageController::class, 'admin']);
$router->post('admin', [AdminController::class, 'changeUserRole']);

//$router->get('about', [StaticPageController::class, 'about']);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);






//use App\Models\User;
//
//$user = User::find(12);
//
//$user->roles()->detach(1);
//
//$login = 'BigBrain';
//
//$users = User::all();
//var_dump($users);
//foreach ($users as $user) {
//    var_dump($user);
//}
//var_dump($users);
//
//$user = User::where('login', '=', $login)->first();
//
//$roles = User::find($user['id'])->roles()->get();
//
//foreach ($roles as $role)
//{
//    var_dump($role['name']);
//}
//$user = User::where('email', '=', $_COOKIE['email'])->first();
//
//$roles = User::find(1)->roles()->get();
//foreach ($roles as $role)
//{
//    var_dump($role['name']);
//}
//var_dump($user);
//var_dump($user->roles);
//foreach ($user->roles as $role) {
//    var_dump($role['name']);
//    echo $role->pivot->created_at;
//    var_dump($role->pivot->user_id);
//}
//var_dump($_COOKIE['email']);


