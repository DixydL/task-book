<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

session_start();

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/App/Models"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

$connectionParams = array(
    'dbname' => 'task',
    'user' => 'task',
    'password' => 'ajadam',
    'host' => 'mysql',
    'driver' => 'pdo_mysql',
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);


// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
