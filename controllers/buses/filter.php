<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$content = trim(file_get_contents("php://input"));
$decoded_content = json_decode($content, true);


$filters = $decoded_content['filters'];
$tourId = $decoded_content["tourId"];
$conditions = [];

if (empty($filters)) {
    $buses = [];
} else {
    foreach ($filters as $key => $value) {
        $conditions[] = $key . " = " . $value;
    }

    $sqlConditions = implode(' AND ', $conditions);

    $buses = $db->query("select * from buses where tour_id = :id AND {$sqlConditions}", [
        "id" => $tourId
    ])->fetchAll();
}

header('Content-Type: application/json');

echo json_encode($buses);