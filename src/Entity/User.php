<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birth = null;

    #[ORM\ManyToMany(targetEntity: Activity::class, mappedBy: 'category')]
    private Collection $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(\DateTimeInterface $birth): static
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Activity $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
            $relation->addCategory($this);
        }

        return $this;
    }

    public function removeRelation(Activity $relation): static
    {
        if ($this->relation->removeElement($relation)) {
            $relation->removeCategory($this);
        }

        return $this;
    }
}
