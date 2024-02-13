<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

if (isset($_GET["s"])) {
    $tours = $db->query(
        "SELECT * FROM tours WHERE 
        LOWER(start_city) LIKE :searchTerm OR 
        LOWER(end_city) LIKE :searchTerm OR 
        LOWER(description) LIKE :searchTerm", [
            "searchTerm" => strtolower($_GET["s"])
        ]
    );
}else {
    $tours = $db->query(
        "select * from tours"
    )->fetchAll();
}


view("home.view.php", [
    "tours" => $tours
]);