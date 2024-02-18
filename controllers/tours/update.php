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

$tourId = $_POST["id"];
$travelId = $_POST["id"];

$toursKeys = ['end_city', 'start_city', 'date', 'description', 'price'];
$travelingsKeys = ['departure_time', 'arrival_time', 'stops'];

$toursValues = array_intersect_key($putValues, array_flip($toursKeys));
$travelingsValues = array_intersect_key($putValues, array_flip($travelingsKeys));

$toursSetParts = [];
foreach (array_keys($toursValues) as $key) {
    $toursSetParts[] = "$key = :$key";
}

$toursSetClause = implode(", ", $toursSetParts);
$toursValues[':id'] = $tourId;

$travelingsSetParts = [];
foreach (array_keys($travelingsValues) as $key) {
    $travelingsSetParts[] = "$key = :$key";
}
$travelingsSetClause = implode(", ", $travelingsSetParts);
$travelingsValues[':id'] = $travelId;


$db->query("UPDATE tours SET $toursSetClause WHERE id = :id", $toursValues);
$db->query("UPDATE travels SET $travelingsSetClause WHERE tour_id = :id", $travelingsValues);

header("location: /");