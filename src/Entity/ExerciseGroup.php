<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ExerciseGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseGroupRepository::class)]
#[ApiResource]
class ExerciseGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'exerciseGroups')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exercise $Exercise = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Student::class, inversedBy: 'exerciseGroups')]
    private Collection $Student;

    public function __construct()
    {
        $this->Student = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExercise(): ?Exercise
    {
        return $this->Exercise;
    }

    public function setExercise(?Exercise $Exercise): self
    {
        $this->Exercise = $Exercise;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudent(): Collection
    {
        return $this->Student;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->Student->contains($student)) {
            $this->Student->add($student);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        $this->Student->removeElement($student);

        return $this;
    }
}
