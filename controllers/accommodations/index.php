<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$accommodations = $db->query(
    "select * from accommodations"
)->fetchAll();

view("accommodations/index.view.php", [
    "accommodations" => $accommodations
]);
