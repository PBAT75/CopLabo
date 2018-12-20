<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StartUpRepository")
 */
class StartUp
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Evenements", mappedBy="startups")
     */
    private $evenements;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
        $this->externalCompanies = new ArrayCollection();
        $this->evenements = new ArrayCollection();
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
     * @return Collection|Evenements[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenements $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->addStartup($this);
        }

        return $this;
    }

    public function removeEvenement(Evenements $evenement): self
    {
        if ($this->evenements->contains($evenement)) {
            $this->evenements->removeElement($evenement);
            $evenement->removeStartup($this);
        }

        return $this;
    }
}
