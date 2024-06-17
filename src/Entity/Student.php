<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;


/**
 * @Entity
 * @Table(name="students")
 */
class Student
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $name;

    /** @OneToMany(targetEntity="Phone", mappedBy="student") */
    private $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: "students")]
    private Collection $courses;


    public function __construct(
    // #[Column]
        //        public readonly string $name
    ) {
        $this->phones = new ArrayCollection();
    }

    public function addPhones(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }
    /**
     * @return Collection<Phone>
     * */
    public function phones(): iterable
    {
        return $this->phones;
    }

    public function courses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course):void
    {
        if($this->courses->contains($course)){
            return;
        }
        $this->courses->add($course);
        $course->addStudent($this);
    }
}