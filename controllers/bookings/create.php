<?php

$tourID = $_GET["id"] ?? "";

view("bookings/create.view.php", [
    "id" => $tourID
]);
