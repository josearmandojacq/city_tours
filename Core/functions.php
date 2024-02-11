<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($code = 404)
{
    http_response_code($code);
    view("404.php");
    die();
}

function base_path($path): string
{
    return __DIR__ . "/../" . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/" . $path);
}

function login($email): void
{
    $_SESSION["user"] = [
        "email" => $email
    ];

    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();

    $sessionParams = session_get_cookie_params();
    setcookie(
        "PHPSESSID",
        "",
        time() - 3600,
        $sessionParams["path"],
        $sessionParams["domain"],
        $sessionParams["secure"],
        $sessionParams["httponly"]
    );

}
