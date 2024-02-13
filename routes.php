<?php

$router->get("", "controllers/home.php");
$router->get("/", "controllers/home.php");

$router->get("/about", "controllers/about.php");

$router->get("/login", "controllers/sessions/create.php")->only("guest");
$router->post("/login", "controllers/sessions/store.php")->only("guest");

$router->get("/tour", "controllers/tours/show.php");
$router->get("/tour/create", "controllers/tours/create.php")->only("admin");
$router->post("/tour", "controllers/tours/store.php");
$router->get("/tour/delete", "controllers/tours/destroy.php");
$router->get("/tour/edit", "controllers/tours/edit.php");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php");

$router->get("/logout", "controllers/sessions/destroy.php")->only("admin");

$router->get("/book", "controllers/bookings/create.php");
$router->post("/book", "controllers/bookings/store.php");

