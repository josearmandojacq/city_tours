<?php

$router->get("", "controllers/home.php");
$router->get("/", "controllers/home.php");

$router->get("/about", "controllers/about.php");

$router->get("/login", "controllers/login.php");
$router->get("/register", "controllers/register.php");

$router->get("/tour", "controllers/tours/show.php");
$router->post("/tour", "controllers/tours/create.php");
$router->delete("/tour", "controllers/tours/destroy.php");