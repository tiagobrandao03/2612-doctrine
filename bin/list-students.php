<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__.'/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository=$entityManager->getRepository(Student::class);

/** @var $studentList */
$studentList = $studentRepository->findAll();

foreach($studentList as $student){
    echo "ID: $student->id\nNome: $student->name\n\n";
}

echo $studentRepository->count([]).PHP_EOL;
///** @var $student */
//$result = $studentRepository->findOneBy([
//    'name' =>'Ana Maria'
//]);
//var_dump($result);