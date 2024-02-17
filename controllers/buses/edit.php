<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$bus = $db->query("select * from buses where id = :id", [
    "id" => $_GET["id"] ?? ""
])->fetch();

view("buses/edit.view.php", [
    "bus" => $bus
]);