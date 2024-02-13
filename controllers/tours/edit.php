<?php
use Core\{App, Database};

$db = App::resolve(Database::class);

$tour = $db->query("select * from tours where id = :id", [
    "id" => $_GET["id"] ?? ""
])->fetch();
$buses = $db->query("select * from buses")->fetchAll();
$accommodations = $db->query("select * from accommodations")->fetchAll();

$travels = $db->query("select * from travels where tour_id = :id", [
    "id" => $_GET["id"] ?? ""
])->fetchAll();


view("tours/edit.view.php", [
    "tour" => $tour,
    "buses" => $buses,
    "accommodations" => $accommodations,
    "travels" => $travels
]);