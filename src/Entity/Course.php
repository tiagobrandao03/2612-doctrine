<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Phones;
use Doctrine\ORM\Mapping\Student;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Course
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(
        mappedBy: "student",
        targetEntity:Phone::class,
        cascade: ["persist", "remove"]
    )]
    private Collection $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: "studens")]
    private Collection $courses;

    public function __construct(

        public readonly string $name
        ){
        $this->studens =new ArrayCollection();
        $this->courses =new ArrayCollection();

    }
    public function addPhones(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }
    public function students():Collection
    {
        return $this->studens;
    }

    /**
    *return Collection<Phone>
    */
    public function phones(): Collection
    {
        return $this->phones;
    }

    public function courses(): Collection
    {
        return $this->courses;
    }


}
