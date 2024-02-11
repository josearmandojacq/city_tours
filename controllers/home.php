<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$tours = $db->query(
    "select * from tours"
)->fetchAll();

view("home.view.php", [
    "tours" => $tours
]);