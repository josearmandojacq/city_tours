<?php


use Core\{App, Database};

$db = App::resolve(Database::class);

$errors = [];

$tour = $db->query(
    "INSERT INTO tours(name, start_city, end_city, description, starting_date, time, price) 
        VALUES(:name, :start_city, :end_city, :description, :starting_date, :time, :price)", [
        "name" => $_POST["name"],
        "start_city" => $_POST["start_city"],
        "end_city" => $_POST["end_city"],
        "description" => $_POST["description"],
        "starting_date" => $_POST["starting_date"],
        "time" => $_POST["time"],
        "price" => $_POST["price"],
    ]
)->fetch();