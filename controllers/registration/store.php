<?php

use Core\{App, Database, Validator};

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email address";
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        "errors" => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query(
    "select * from users where email = :email", [
        "email" => $email
    ])->fetch();

if ($user) {
    header("location: /");
    exit();
} else {
    $db->query(
        "insert into users(email, password) values(:email, :password)", [
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]
    );

    $_SESSION["user"] = [
        "email" => $email
    ];

    header("location: /");
    exit();
}