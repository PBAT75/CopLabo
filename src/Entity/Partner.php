<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 */
class Partner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StartUpRelation", mappedBy="partner", fetch="EAGER")
     */
    private $startUpRelations;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Person", mappedBy="partner", cascade={"persist", "remove"})
     */
    private $person;




    public function __construct()
    {
        $this->startUp = new ArrayCollection();
        $this->startUpRelations = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(?int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|StartUpRelation[]
     */
    public function getStartUpRelations(): Collection
    {
        return $this->startUpRelations;
    }

    public function addStartUpRelation(StartUpRelation $startUpRelation): self
    {
        if (!$this->startUpRelations->contains($startUpRelation)) {
            $this->startUpRelations[] = $startUpRelation;
            $startUpRelation->setPartner($this);
        }

        return $this;
    }

    public function removeStartUpRelation(StartUpRelation $startUpRelation): self
    {
        if ($this->startUpRelations->contains($startUpRelation)) {
            $this->startUpRelations->removeElement($startUpRelation);
            // set the owning side to null (unless already changed)
            if ($startUpRelation->getPartner() === $this) {
                $startUpRelation->setPartner(null);
            }
        }

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        // set (or unset) the owning side of the relation if necessary
        $newPartner = $person === null ? null : $this;
        if ($newPartner !== $person->getPartner()) {
            $person->setPartner($newPartner);
        }

        return $this;
    }



}
