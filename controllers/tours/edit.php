<?php
use Core\{App, Database};

$db = App::resolve(Database::class);


$tour = $db->query("select * from tours where id = :id", ["id" => $_GET["id"]])->fetch();

view("tours/edit.view.php", [
    "tour" => $tour
]);