<?php

require __DIR__ . '/../bootstrap.php';

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class). '.php';
    include '../'.$file;
});

$app = new \App\Core\App($entityManager);

$app->initRouters(__DIR__."/../routes/web.php");

$app->run();
