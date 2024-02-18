<?php
use Core\{App, Database};

$db = App::resolve(Database::class);

$content = file_get_contents('php://input');
$valuesArray = json_decode($content, true);

$bookingID = $valuesArray["id"];

$booking = $_SESSION["bookings"][$bookingID];

$busId = $booking["bus"];
$tourId = $booking["tour"];
$accommodationId = $booking["accommodation"];

$bus = $db->query("select * from buses where id = :id",["id" => $busId])->fetch();

if ($bus["seats"] <= 0) {
    throw new \Exception("Bus ist voll");
}

$tour = $db->query("select * from tours where id = :id",["id" => $tourId])->fetch();

if ($bus["availability"] > $tour["date"]) {
    throw new \Exception("Bus ist nicht zu dieser Zeit Verfügbar");
}

$db->query(
    "insert into bookings(user_id, tour_id, bus_id, accommodation_id) values(:user_id, :tour_id, :bus_id, :accommodation_id)", [
        "user_id" => $_SESSION["user"]["id"],
        "tour_id" => $tourId,
        "bus_id" => $busId,
        "accommodation_id" => $accommodationId
    ]
);

$db->query(
    "UPDATE buses SET seats = seats - 1 WHERE id = :id", [
        "id" => $busId
    ]
);

$db->query(
    "UPDATE accommodations SET available_rooms = available_rooms - 1 WHERE id = :id", [
        "id" => $accommodationId
    ]
);

unset($_SESSION["bookings"][$bookingID]);

echo json_encode($_SESSION["bookings"]);