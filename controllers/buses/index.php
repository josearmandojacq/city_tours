<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$buses = $db->query(
    "select * from buses"
)->fetchAll();

view("buses/index.view.php", [
    "buses" => $buses
]);
