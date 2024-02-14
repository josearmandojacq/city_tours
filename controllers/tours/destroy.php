<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$tourId = $_GET["id"] ?? "";

$db->query(
    "delete from travels where tour_id = :id", [
        "id" => $tourId
    ]
);

$db->query(
    "delete from buses where tour_id = :id", [
        "id" => $tourId
    ]
);

$db->query(
    "delete from accommodations where tour_id = :id", [
        "id" => $tourId
    ]
);

$db->query(
    "delete from bookings where tour_id = :id", [
        "id" => $tourId
    ]
);

$images = $db->query(
    "select * from images where tour_id = :id",
    [
        "id" => $_SESSION["tour_id"] ?? ""
    ]
)->fetchAll();

if ($images)
{
    foreach ($images as $image) {
        unlink("/uploads/" . $image["name"]);
    }
}

$db->query(
    "delete from images where tour_id = :id", [
        "id" => $tourId
    ]
);

$db->query(
    "delete from tours where id = :id", [
        "id" => $_GET["id"]
    ]
);

$tours = $db->query("select * from tours")->fetchAll();

view("home.view.php", [
    "tours" => $tours
]);
