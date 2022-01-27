<?php
use App\Application;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$application = new Application();

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

