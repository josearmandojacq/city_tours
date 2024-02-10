<?php

require __DIR__ . "/../Core/functions.php";

use Core\{Database, Router};

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

$router = new Router();

$routes = require base_path("routes.php");

$url = parse_url($_SERVER["REQUEST_URI"]);
$path = $url["path"];

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($path, $method);

session_start();