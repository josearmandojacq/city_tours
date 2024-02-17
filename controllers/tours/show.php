<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$filters = [];
$conditions = [];
$checkedValues = [];
$sqlConditions = "";

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

$buses = $db->query("select * from buses where tour_id = :id", [
    "id" => $_SESSION["tour_id"] ?? ""
])->fetchAll();

$accommodations = $db->query(
    "select * from accommodations where tour_id = :id and lower(city) = :city",
    [
        "id" => $_SESSION["tour_id"] ?? "",
        "city" => strtolower($_SESSION["tour"]["end_city"])
    ]
)->fetchAll();


$images = $db->query(
    "select * from images where tour_id = :id",
    [
        "id" => $_SESSION["tour_id"] ?? ""
    ]
)->fetchAll();


view("tours/show.view.php", [
    "tour" => $tour,
    "travels" => $travels,
    "buses" => $buses,
    "accommodations" => $accommodations,
    "images" => $images
]);