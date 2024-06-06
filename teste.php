<?php
require_once "vendor/autoload.php";

$entityManager=\Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

var_dump($entityManager);

///**INSERT*/
/// $student = new Student( "Aluno com telefones");
//$phone1=new \Alura\Doctrine\Entity\Phone('(21) 9999 - 9999');
//$phone2=new \Alura\Doctrine\Entity\Phone('((21) 2222 - 2222');
//$entityManager->persist($phone1);
//$entityManager->persist($phone2);

//$student = new Student('Aluno com telefones');
//$student->addPhone($phone1);
//$student->addPhone($phone2);

