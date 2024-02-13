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

if (isset($_GET)) {
    $filters["wlan"] = isset($_GET["wlan"]) ? (int)$_GET["wlan"] : "";
    $filters["toilet"] = isset($_GET["toilet"]) ? (int)$_GET["toilet"] : "";
    $filters["power_outlet"] = isset($_GET["power_outlet"]) ? (int)$_GET["power_outlet"] : "";
    $filters["air_conditioner"] = isset($_GET["air_conditioner"]) ? (int)$_GET["air_conditioner"] : "";
    $filters["entertainment_system"] = isset($_GET["entertainment_system"]) ? (int)$_GET["entertainment_system"] : "";
    $filters["accessibility"] = isset($_GET["accessibility"]) ? (int)$_GET["accessibility"] : "";
    $filters["board_service"] = isset($_GET["board_service"]) ? (int)$_GET["board_service"] : "";

    $checkedValues = array_filter($filters, function ($value) {
        return $value == 1;
    });

    foreach ($checkedValues as $key => $value) {
        $key = preg_replace('/[^a-zA-Z_]/', '', $key);
        $conditions[] = "$key = 1";
    }

    $sqlConditions = implode(' AND ', $conditions);
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

if (!empty($sqlConditions)) {
    $buses = $db->query("select * from buses where tour_id = :id AND {$sqlConditions}", [
        "id" => $_SESSION["tour_id"] ?? ""
    ])->fetchAll();
}else {
    $buses = $db->query("select * from buses where tour_id = :id", [
        "id" => $_SESSION["tour_id"] ?? ""
    ])->fetchAll();
}

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