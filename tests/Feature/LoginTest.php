<?php

use Core\App;
use Core\Database;
use Core\Container;
use Core\Validator;
use function PHPUnit\Framework\{assertEquals, assertTrue};

require_once __DIR__ . '/../../Core/Functions.php';

session_start();

beforeEach(function () {
    $container = new Container();
    App::setContainer($container);

    $_SESSION = [];
});

test('user can log in with correct credentials', function () {
    $validator = Mockery::mock(Validator::class);
    $dbMock = Mockery::mock(Database::class);
    App::bind(Database::class, $dbMock);


    $validator->shouldReceive('email')->with('test@example.com')->andReturn(true);
    $validator->shouldReceive('password')->with('password')->andReturn(true);


    $_POST['email'] = 'test@example.com';
    $_POST['password'] = 'password';

    $expectedUser = [
        'id' => 1,
        'email' => 'test@example.com',
        'password' => password_hash('password', PASSWORD_DEFAULT),
    ];

    $dbMock->shouldReceive('query')->andReturnSelf();
    $dbMock->shouldReceive('fetch')->andReturn($expectedUser);

    login($expectedUser, $_POST['password']);

    assertEquals($_SESSION['user']['email'], 'test@example.com');
});

test('user cannot log in with incorrect credentials', function () {
    $validator = Mockery::mock(Validator::class);
    $dbMock = Mockery::mock(Database::class);
    App::bind(Database::class, $dbMock);

    // Mocking Validator methods to return true for email validation
    // Assuming the email format validation passes but the credentials are incorrect
    $validator->shouldReceive('email')->with('wrong@example.com')->andReturn(true);
    $validator->shouldReceive('password')->with('wrongpassword')->andReturn(true);

    $_POST['email'] = 'wrong@example.com';
    $_POST['password'] = 'wrongpassword';

    $expectedUser = [
        'id' => 1,
        'email' => 'test@example.com',
        // This would be the hashed password stored in the database
        'password' => password_hash('correctpassword', PASSWORD_DEFAULT),
    ];

    // The database mock should return a user object, simulating a user found with the provided email
    $dbMock->shouldReceive('query')->andReturnSelf();
    $dbMock->shouldReceive('fetch')->andReturn($expectedUser);

    login($expectedUser, $_POST['password']);

    // Assertions
    // Check that $_SESSION['user'] is not set, indicating the login failed
    assertTrue(!isset($_SESSION['user']));
});

