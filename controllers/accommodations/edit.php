<?php

use Core\{App, Database};

$db = App::resolve(Database::class);


$accommodation = $db->query("select * from accommodations where id = :id", [
    "id" => $_GET["id"] ?? ""
])->fetch();

view("accommodations/edit.view.php", [
    "accommodation" => $accommodation
]);