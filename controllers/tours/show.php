<?php
$config = require base_path("config.php");
$db = new Core\Database($config["database"]);


$tour = $db->query("select * from tours where id = :id", ["id" => $_GET["id"]])->fetch();


view("tours/show.view.php", [
    "tour" => $tour
]);