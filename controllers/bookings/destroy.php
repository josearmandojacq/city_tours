<?php

unset($_SESSION["bookings"][$_GET["bookingID"]]);

header("location: /bookings");
