<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($code = 404)
{
    http_response_code($code);
    view("404.php");
    die();
}

function base_path($path): string
{
    return __DIR__ . "/../" . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/" . $path);
}
