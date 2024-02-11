<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
#[Broadcast]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endat = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column]
    private ?int $maxpeople = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'relation')]
    private Collection $category;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getEndat(): ?\DateTimeInterface
    {
        return $this->endat;
    }

    public function setEndat(\DateTimeInterface $endat): static
    {
        $this->endat = $endat;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getMaxpeople(): ?int
    {
        return $this->maxpeople;
    }

    public function setMaxpeople(int $maxpeople): static
    {
        $this->maxpeople = $maxpeople;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(User $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(User $category): static
    {
        $this->category->removeElement($category);

        return $this;
    }
}
