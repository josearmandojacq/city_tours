<?php

$content = file_get_contents('php://input');
$valuesArray = json_decode($content, true);

if (!isset($_SESSION["bookings"])) {
    $_SESSION["bookings"] = [];
}

$tourIdAlreadyPresent = false;
foreach ($_SESSION["bookings"] as $booking) {
    if (isset($booking["tour"]) && $booking["tour"] == $valuesArray["id"]) {
        $tourIdAlreadyPresent = true;
        break;
    }
}

if (!$tourIdAlreadyPresent) {
    $tourAdded = false;
    foreach ($_SESSION["bookings"] as &$booking) {
        if (!isset($booking["tour"])) {
            $booking["tour"] = $valuesArray["id"];
            $tourAdded = true;
            break;
        }
    }
    unset($booking);

    if (!$tourAdded) {
        $newBookingId = uniqid('booking_', true);
        $_SESSION["bookings"][$newBookingId] = ["tour" => $valuesArray["id"]];
    }
}

echo json_encode($_SESSION["bookings"]);