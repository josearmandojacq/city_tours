<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$postValues = [];

if(is_array($_POST)) {
    foreach ($_POST as $key => $values) {
        $postValues[$key] = $values;
    }
}else {
   throw new \Exception("Wrong params passed");
}

$columns = implode(", ", array_keys($postValues));
$placeholders = ":" . implode(", :", array_keys($postValues));
$values = array_combine(
    array_map(function($k) { return ':' . $k; }, array_keys($postValues)),
    array_values($postValues)
);


$db->query(
    "insert into buses($columns) values($placeholders)", $postValues
);

header("location: /buses");