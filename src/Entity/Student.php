<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    #[Id, GeneratedValue, Column]

    public int $id;

    #[OneToMany(
        targetEntity: Phone::class,
        mappedBy: "student",
        cascade: ["persist","remove"])]
    private Collection $phones;
    public function __construct(
        #[Column]
        public readonly string $name
    ) {
        $this->phones = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
    }
    /**
     * @return iterable<Phone>
     * */
    public function phones(): iterable
    {
        return $this->phones;
    }
}