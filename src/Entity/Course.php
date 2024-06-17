<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity
 * @Table(name="courses")
 */
class Course
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $name;
    #[ManyToMany(
        Student::class,
        mappedBy: "student")]
    private Collection $student;

    public function __construct(

        //public readonly string $nome
        ){
        $this->students =new ArrayCollection();


    }

    public function students():Collection
    {
        return $this->students;
    }

    public function addstudents(student $student):void
    {
        if($this->students->contains($student)){
            return;
        }
        $this->students->add($student);
        $student->enrollInCourse($this);
    }

}
