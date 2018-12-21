<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $uuid;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Relation", mappedBy="user1")
     */
    private $relations1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Relation", mappedBy="user2")
     */
    private $relations2;

    /**
     * @OneToOne(targetEntity="Person", inversedBy="user")
     * @JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

    public function __construct()
    {
        $this->relations1 = new ArrayCollection();
        $this->relations2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->uuid;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Relation[]
     */
    public function getRelations1(): Collection
    {
        return $this->relations1;
    }

    public function addRelations1(Relation $relations1): self
    {
        if (!$this->relations1->contains($relations1)) {
            $this->relations1[] = $relations1;
            $relations1->setUser1($this);
        }

        return $this;
    }

    public function removeRelations1(Relation $relations1): self
    {
        if ($this->relations1->contains($relations1)) {
            $this->relations1->removeElement($relations1);
            // set the owning side to null (unless already changed)
            if ($relations1->getUser1() === $this) {
                $relations1->setUser1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Relation[]
     */
    public function getRelations2(): Collection
    {
        return $this->relations2;
    }

    public function addRelations2(Relation $relations2): self
    {
        if (!$this->relations2->contains($relations2)) {
            $this->relations2[] = $relations2;
            $relations2->setUser2($this);
        }

        return $this;
    }

    public function removeRelations2(Relation $relations2): self
    {
        if ($this->relations2->contains($relations2)) {
            $this->relations2->removeElement($relations2);
            // set the owning side to null (unless already changed)
            if ($relations2->getUser2() === $this) {
                $relations2->setUser2(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person): void
    {
        $this->person = $person;
    }
}
