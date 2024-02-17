<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$db->query(
    "delete from buses where id = :id", [
        "id" => $_GET["id"]
    ]
);

header("location: /buses");
