<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$content = file_get_contents('php://input');
$valuesArray = json_decode($content, true);

if (!isset($_SESSION["bookings"])) {
    $_SESSION["bookings"] = [];
}

$busIdAlreadyPresent = false;
foreach ($_SESSION["bookings"] as $booking) {
    if (isset($booking["bus"]) && $booking["bus"] == $valuesArray["id"]) {
        $busIdAlreadyPresent = true;
        break;
    }
}

if (!$busIdAlreadyPresent) {
    $busAdded = false;
    foreach ($_SESSION["bookings"] as &$booking) {
        if (!isset($booking["bus"])) {
            $booking["bus"] = $valuesArray["id"];
            $busAdded = true;
            break;
        }
    }
    unset($booking);

    if (!$busAdded) {
        $newBookingId = uniqid('booking_', true);
        $_SESSION["bookings"][$newBookingId] = ["bus" => $valuesArray["id"]];
    }
}

echo json_encode($_SESSION["bookings"]);