<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config["database"]);

$tours = $db->query(
    "select * from tours"
)->fetchAll();

view("home.view.php", [
    "tours" => $tours
]);