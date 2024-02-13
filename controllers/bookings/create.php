<?php
use Core\{App, Database};

$db = App::resolve(Database::class);

$tourID = $_GET["id"] ?? "";

$tour = $db->query("select * from tours where id = :id", [
    "id" => $tourID
])->fetch();

$buses = $db->query("select * from buses where tour_id = :id", [
    "id" => $tourID
])->fetchAll();

view("bookings/create.view.php", [
    "id" => $tourID
]);
