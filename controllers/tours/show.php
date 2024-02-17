<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

if (isset($_GET["id"])) {
    $_SESSION["tour_id"] = $_GET["id"] ?? "";
}

$tour = $db->query("select * from tours where id = :id", [
    "id" => $_SESSION["tour_id"] ?? ""
])->fetch();

if (isset($tour)) {
    $_SESSION["tour"] = $tour;
}

$travels = $db->query("select * from travels where tour_id = :id", [
    "id" => $_SESSION["tour_id"] ?? ""
])->fetchAll();


$images = $db->query(
    "select * from images where tour_id = :id",
    [
        "id" => $_SESSION["tour_id"] ?? ""
    ]
)->fetchAll();

view("tours/show.view.php", [
    "tour" => $tour,
    "travels" => $travels,
    "images" => $images
]);