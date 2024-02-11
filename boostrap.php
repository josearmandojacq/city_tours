<?php

use Core\{Container, App};

$container = new Container();

$container->add("Core\Database", function (){
    $config = require base_path("config.php");

    return new Core\Database($config["database"]);
});

App::setContainer($container);

