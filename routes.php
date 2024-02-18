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
$router->put("/tour", "controllers/tours/update.php")->only("admin");
$router->post("/tour/booking", "controllers/tours/booking.php");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");;

$router->get("/logout", "controllers/sessions/destroy.php");

$router->get("/bookings", "controllers/bookings/index.php");
$router->post("/booking/create", "controllers/bookings/create.php");
$router->get("/booking/delete", "controllers/bookings/destroy.php");

$router->post("/filter", "controllers/buses/filter.php")->only("admin");
$router->get("/bus/create", "controllers/buses/create.php")->only("admin");
$router->post("/bus", "controllers/buses/store.php")->only("admin");
$router->get("/bus", "controllers/buses/show.php");
$router->get("/buses", "controllers/buses/index.php");
$router->get("/bus/edit", "controllers/buses/edit.php")->only("admin");
$router->put("/bus", "controllers/buses/update.php")->only("admin");
$router->get("/bus/delete", "controllers/buses/destroy.php")->only("admin");
$router->post("/bus/booking", "controllers/buses/booking.php");

$router->get("/accommodations", "controllers/accommodations/index.php");
$router->get("/accommodation/create", "controllers/accommodations/create.php")->only("admin");
$router->post("/accommodation", "controllers/accommodations/store.php")->only("admin");
$router->get("/accommodation", "controllers/accommodations/show.php");
$router->get("/accommodation/edit", "controllers/accommodations/edit.php")->only("admin");
$router->put("/accommodation", "controllers/accommodations/update.php")->only("admin");
$router->get("/accommodation/delete", "controllers/accommodations/destroy.php")->only("admin");
$router->post("/accommodation/booking", "controllers/accommodations/booking.php");


