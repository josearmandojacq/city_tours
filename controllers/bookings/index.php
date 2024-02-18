<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$bookings = [];
$entityMapping = [
    'bus' => ['table' => 'buses', 'idColumn' => 'id'],
    'accommodation' => ['table' => 'accommodations', 'idColumn' => 'id'],
    'tour' => ['table' => 'tours', 'idColumn' => 'id'],
];



if (!empty($_SESSION["bookings"]) && is_array($_SESSION["bookings"])) {
    foreach ($_SESSION["bookings"] as $bookingId => $bookingDetails) {
        foreach ($bookingDetails as $key => $value) {
            if (array_key_exists($key, $entityMapping)) {
                $table = $entityMapping[$key]['table'];
                $idColumn = $entityMapping[$key]['idColumn'];

                $fetchedRows = $db->query("SELECT * FROM {$table} WHERE {$idColumn} = :id", [
                    'id' => $value
                ])->fetchAll();

                $bookings[$bookingId][$key] = $fetchedRows;

                if($key == "tour") {
                    $travels = $db->query("SELECT * FROM travels WHERE tour_id = :id", [
                        'id' => $value
                    ])->fetch();

                    $bookings[$bookingId]["travel"] = $travels;
                }
            }
        }
    }
}

view("bookings/index.view.php", [
    "bookings" => $bookings
]);
