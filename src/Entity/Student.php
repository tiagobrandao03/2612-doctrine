<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public readonly $id;
    public function __construct(public readonly string $name){
    //public readonly $id, #[Column(type: "string")] public readonly $nome

    }
}