<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ .'/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$course = new \Alura\Doctrine\Entity\Course($argv[1]);


$entityManager->persist($course);
$entityManager->flush();