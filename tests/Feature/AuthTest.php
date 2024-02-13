<?php

use function PHPUnit\Framework\assertStringContainsString;
use function PHPUnit\Framework\assertStringNotContainsString;

require_once __DIR__ . '/../../Core/Functions.php';
require_once __DIR__ . '/../../Core/Container.php';
require_once __DIR__ . '/../../vendor/autoload.php';

beforeEach(function () {
    $_SESSION = [];
});

test('admin users can see edit and delete actions', function () {
    $tours = [
        [
            "id" => 1,
            "end_city" => "City A",
            "start_city" => "City B",
            "date" => "2023-01-01",
        ]
    ];
    $_SESSION["user"] = ["role" => "admin"];
    ob_start();

    include __DIR__ . '/../../views/home.view.php';
    $output = ob_get_clean();

    assertStringContainsString('/tour/create', $output);
    assertStringContainsString('/tour/edit?id=', $output);
    assertStringContainsString('/tour/delete?id=', $output);
});

test('regular users cannot see edit and delete actions', function () {
    $tours = [
        [
            "id" => 1,
            "end_city" => "City A",
            "start_city" => "City B",
            "date" => "2023-01-01",
        ]
    ];
    $_SESSION["user"] = ["role" => "user"];
    ob_start();

    include __DIR__ . '/../../views/home.view.php';
    $output = ob_get_clean();


    assertStringNotContainsString('/tour/create', $output);
    assertStringNotContainsString('/tour/edit?id=', $output);
    assertStringNotContainsString('/tour/delete?id=', $output);
});
