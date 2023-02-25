<?php
use Core\Routing\Request;
use Core\Routing\Router;

const BASE_PATH = __DIR__ . '/../src/';
require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/src/Core/bootstrap.php";

$router = new Router();

Router::load( base_path('routes/routes.php'))->direct(Request::uri(), Request::method());
