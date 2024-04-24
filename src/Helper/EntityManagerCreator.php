<?php

namespace Alura\Doctrine\Helper;
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

//require_once "vendor/autoload.php";
class EntityManagerCreator
{
public static function createEntityManager(){


$config = ORMSetup::createAttributeMetadataConfiguration(
[__DIR__ . "/.."],
true,
);

// configuring the database connection
$connection = DriverManager::getConnection(['driver' => 'pdo_sqlite',
'path' => __DIR__ . '/../../db.sqlite',], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
}
}