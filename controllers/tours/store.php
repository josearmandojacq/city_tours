<?php


use Core\{App, Database};

$db = App::resolve(Database::class);


$tour = $db->query(
    "INSERT INTO tours(start_city, end_city, description, price, date) 
        VALUES(:start_city, :end_city, :description, :price, :date)", [
    "start_city" => $_POST["start_city"],
    "end_city" => $_POST["end_city"],
    "description" => $_POST["description"],
    "price" => $_POST["price"],
    "date" => $_POST["date"],
]);

$tourID = $tour ? $db->lastInsertedID() : "";

$db->query(
    "insert into travels(departure_time, arrival_time, stops,tour_id) values(:departure_time, :arrival_time, :stops, :tour_id)", [
        "departure_time" => $_POST["departure_time"] ?? null,
        "arrival_time" => $_POST["arrival_time"] ?? null,
        "stops" => $_POST["stops"] ?? null,
        "tour_id" => $tourID,
    ]
);

if (isset($_FILES['image'])) {
    $totalFiles = count($_FILES['image']['name']);
    $allowed = ["jpg" => "image/jpeg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];

    for ($i = 0; $i < $totalFiles; $i++) {
        if ($_FILES['image']['error'][$i] == 0) {
            $filename = bin2hex(random_bytes(16)) . "-" . $_FILES['image']['name'][$i];
            $filesize = $_FILES["image"]["size"][$i];
            $filetype = $_FILES["image"]["type"][$i];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            $maxsize = 2 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            $tmpName = $_FILES['image']['tmp_name'][$i];


            $destination =  __DIR__ . '/../../uploads/' . $filename;

            if (file_exists($destination . $filename)) die("Error file: " . $filename . " already exists.");

            if (move_uploaded_file($tmpName, $destination)) {
               $db->query(
                   "insert into images(name, tour_id) values(:name, :tour_id)", [
                       "name" => $filename,
                       "tour_id" => $tourID
                   ]
               );
            } else {
                throw new \Exception("Bild könnte nicht kopiert worden");
            }
        }
    }
}

header("location: /");

