<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(targetEntity: Student::class, mappedBy:"phones")]
    private readonly Student $student;
    public function __construct(
        #[Column]
        public readonly string $number
    ){

    }

    public function setStudent(Student $student): void
    {
        $this->student->$student;
    }

}