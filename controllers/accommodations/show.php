<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$accommodation = $db->query("select * from accommodations where id = :id", [
    "id" => $_GET["id"] ?? ""
])->fetch();

$images = $db->query(
    "select * from images where accommodation_id = :id",
    [
        "id" => $_GET["id"] ?? ""
    ]
)->fetchAll();

view("accommodations/show.view.php", [
    "accommodation" => $accommodation,
    "images" => $images
]);

