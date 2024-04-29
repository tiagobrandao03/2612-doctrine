<?php

namespace Alura\Doctrine\Helper;
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

//require_once "vendor/autoload.php";
class EntityManagerCreator
{
public static function createEntityManager(): EntityManager{


$config = ORMSetup::createAttributeMetadataConfiguration(
[__DIR__ . "/.."],
true,
);

// configuring the database connection
    $conn = [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../../db.sqlite',
    ];

// obtaining the entity manager
    return EntityManager::create($conn, $config);
}
}