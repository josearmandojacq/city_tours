<?php
use Core\{App, Database};

$db = App::resolve(Database::class);

$tourID = $_GET["id"] ?? "";

$tour = $db->query("select * from tours where id = :id", [
    "id" => $tourID
])->fetch();

view("buses/create.view.php", [
    "tour" => $tour
]);

