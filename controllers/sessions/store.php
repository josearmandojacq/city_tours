<?php

use Core\{App, Database, Validator};

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email address";
}

if (!Validator::password($password)) {
    $errors["password"] = "Please provide a password";
}

if (!empty($errors)) {
    return view("sessions/create.view.php", [
        "errors" => $errors
    ]);
}

$user = $db->query(
    "select * from users where email = :email", [
        "email" => $email
    ]
)->fetch();

if ($user) {
    if (password_verify($password, $user["password"])) {
        login($email);

        header("location: /");
        exit();
    }
}


return view("sessions/create.view.php", [
    "errors" => [
        "email" => "Ungültiges Email oder Passwort"
    ]
]);
