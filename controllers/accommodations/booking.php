<?php

$content = file_get_contents('php://input');
$valuesArray = json_decode($content, true);

if (!isset($_SESSION["bookings"])) {
    $_SESSION["bookings"] = [];
}

$accIdAlreadyPresent = false;
foreach ($_SESSION["bookings"] as $booking) {
    if (isset($booking["accommodation"]) && $booking["accommodation"] == $valuesArray["id"]) {
        $accIdAlreadyPresent = true;
        break;
    }
}

if (!$accIdAlreadyPresent) {
    $busAdded = false;
    foreach ($_SESSION["bookings"] as &$booking) {
        if (!isset($booking["accommodation"])) {
            $booking["accommodation"] = $valuesArray["id"];
            $accAdded = true;
            break;
        }
    }
    unset($booking);

    if (!$accAdded) {
        $newBookingId = uniqid('booking_', true);
        $_SESSION["bookings"][$newBookingId] = ["accommodation" => $valuesArray["id"]];
    }
}

echo json_encode($_SESSION["bookings"]);
