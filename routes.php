<?php

$router->get("", "controllers/home.php");
$router->get("/", "controllers/home.php");

$router->get("/about", "controllers/about.php");

$router->get("/login", "controllers/sessions/create.php")->only("guest");
$router->post("/login", "controllers/sessions/store.php")->only("guest");

$router->get("/tour", "controllers/tours/show.php");
$router->get("/tour/create", "controllers/tours/create.php")->only("admin");
$router->post("/tour", "controllers/tours/store.php")->only("admin");
$router->get("/tour/delete", "controllers/tours/destroy.php")->only("admin");
$router->get("/tour/edit", "controllers/tours/edit.php")->only("admin");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");;

$router->get("/logout", "controllers/sessions/destroy.php");

$router->get("/booking", "controllers/bookings/create.php");
$router->post("/booking", "controllers/bookings/store.php");

$router->post("/filter", "controllers/buses/filter.php");
$router->get("/bus/create", "controllers/buses/create.php")->only("admin");
$router->post("/bus", "controllers/buses/store.php")->only("admin");
$router->get("/bus", "controllers/buses/index.php")->only("admin");

$router->get("/accommodations", "controllers/accommodations/index.php")->only("admin");
