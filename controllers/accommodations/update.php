<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$putValues = [];

if (is_array($_POST)) {
    foreach ($_POST as $key => $values) {
        if ($key != "_method" && $key != "id") {
            $putValues[$key] = $values;
        }
    }
} else {
    throw new \Exception("Wrong params passed");
}

$busID = $_POST["id"];

$setParts = [];
foreach (array_keys($putValues) as $key) {
    $setParts[] = "$key = :$key";
}
$setClause = implode(", ", $setParts);

// Prepare values for placeholders
$values = array_combine(
    array_map(function($k) { return ':' . $k; }, array_keys($putValues)),
    array_values($putValues)
);

$values[':id'] = $busID;

$db->query(
    "UPDATE accommodations SET $setClause WHERE id = :id", $values
);

header("location: /accommodations");