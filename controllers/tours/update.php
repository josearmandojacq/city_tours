<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$errors = [];

$tour = $db->query(
    "
        UPDATE tours 
        SET name = :name, start_city = :start_city, end_city = :end_city, description = :description, starting_date = :starting_date, time = :time, price = :price 
        WHERE id = :id
    ", [
        "id" => $_POST["id"],
        "name" => $_POST["name"],
        "start_city" => $_POST["start_city"],
        "end_city" => $_POST["end_city"],
        "description" => $_POST["description"],
        "starting_date" => $_POST["starting_date"],
        "time" => $_POST["time"],
        "price" => $_POST["price"]
    ]
)->fetch();


view("tours/edit.view.php");
