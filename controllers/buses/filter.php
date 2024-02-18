<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$content = trim(file_get_contents("php://input"));
$decoded_content = json_decode($content, true);


$filters = $decoded_content['filters'];
$busId = $decoded_content['busId'];
$conditions = [];

if (empty($filters)) {
    $buses = [];
} else {
    foreach ($filters as $key => $value) {
        $conditions[] = $key . " = " . $value;
    }

    $sqlConditions = implode(' AND ', $conditions);

    $buses = $db->query("select * from buses where {$sqlConditions}")->fetchAll();
}

header('Content-Type: application/json');

echo json_encode($buses);