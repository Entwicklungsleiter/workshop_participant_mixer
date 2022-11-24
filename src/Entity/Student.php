<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ApiResource]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: ExerciseGroup::class, mappedBy: 'Student')]
    private Collection $exerciseGroups;

    public function __construct()
    {
        $this->exerciseGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, ExerciseGroup>
     */
    public function getExerciseGroups(): Collection
    {
        return $this->exerciseGroups;
    }

    public function addExerciseGroup(ExerciseGroup $exerciseGroup): self
    {
        if (!$this->exerciseGroups->contains($exerciseGroup)) {
            $this->exerciseGroups->add($exerciseGroup);
            $exerciseGroup->addStudent($this);
        }

        return $this;
    }

    public function removeExerciseGroup(ExerciseGroup $exerciseGroup): self
    {
        if ($this->exerciseGroups->removeElement($exerciseGroup)) {
            $exerciseGroup->removeStudent($this);
        }

        return $this;
    }
}
