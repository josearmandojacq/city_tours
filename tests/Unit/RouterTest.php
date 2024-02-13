<?php

use Core\Router;

it('can add and retrieve a GET route', function () {
    $router = new Router();
    $router->get('/test', 'TestController@index');

    $expected = [
        "uri" => "/test",
        "controller" => "TestController@index",
        "method" => "GET",
        "middleware" => null
    ];

    expect($router->routes)->toContain($expected);
});

it('can add and retrieve a POST route', function () {
    $router = new Router();
    $router->post('/test', 'TestController@store');

    $expected = [
        "uri" => "/test",
        "controller" => "TestController@store",
        "method" => "POST",
        "middleware" => null
    ];

    expect($router->routes)->toContain($expected);
});

// Test chaining middleware assignment
it('can chain middleware to a route', function () {
    $router = new Router();
    $router->get('/admin', 'AdminController@index')->only('admin');

    $expected = [
        "uri" => "/admin",
        "controller" => "AdminController@index",
        "method" => "GET",
        "middleware" => 'admin'
    ];

    expect($router->routes)->toContain($expected);
});
