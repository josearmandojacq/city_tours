<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$db->query(
    "delete from tours where id = :id", [
        "id" => $_POST["id"]
    ]
);

$tours = $db->query("select * from tours")->fetchAll();

view("home.view.php", [
    "tours" => $tours
]);
