<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ExerciseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
#[ApiResource]
class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $max_people = null;

    #[ORM\ManyToOne(inversedBy: 'exercises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Course $Course = null;

    #[ORM\OneToMany(mappedBy: 'Exercise', targetEntity: ExerciseGroup::class, orphanRemoval: true)]
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

    public function getMaxPeople(): ?int
    {
        return $this->max_people;
    }

    public function setMaxPeople(int $max_people): self
    {
        $this->max_people = $max_people;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->Course;
    }

    public function setCourse(?Course $Course): self
    {
        $this->Course = $Course;

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
            $exerciseGroup->setExercise($this);
        }

        return $this;
    }

    public function removeExerciseGroup(ExerciseGroup $exerciseGroup): self
    {
        if ($this->exerciseGroups->removeElement($exerciseGroup)) {
            // set the owning side to null (unless already changed)
            if ($exerciseGroup->getExercise() === $this) {
                $exerciseGroup->setExercise(null);
            }
        }

        return $this;
    }
}
