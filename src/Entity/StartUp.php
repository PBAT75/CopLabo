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
     * @ORM\OneToMany(targetEntity="App\Entity\Attribution", mappedBy="startup")
     */
    private $attributions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ChampsSoumis", mappedBy="startup")
     */
    private $champsSoumis;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
        $this->externalCompanies = new ArrayCollection();
        $this->attributions = new ArrayCollection();
        $this->champsSoumis = new ArrayCollection();
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
     * @return Collection|Attribution[]
     */
    public function getAttributions(): Collection
    {
        return $this->attributions;
    }

    public function addAttribution(Attribution $attribution): self
    {
        if (!$this->attributions->contains($attribution)) {
            $this->attributions[] = $attribution;
            $attribution->setStartup($this);
        }

        return $this;
    }

    public function removeAttribution(Attribution $attribution): self
    {
        if ($this->attributions->contains($attribution)) {
            $this->attributions->removeElement($attribution);
            // set the owning side to null (unless already changed)
            if ($attribution->getStartup() === $this) {
                $attribution->setStartup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampsSoumis[]
     */
    public function getChampsSoumis(): Collection
    {
        return $this->champsSoumis;
    }

    public function addChampsSoumi(ChampsSoumis $champsSoumi): self
    {
        if (!$this->champsSoumis->contains($champsSoumi)) {
            $this->champsSoumis[] = $champsSoumi;
            $champsSoumi->setStartup($this);
        }

        return $this;
    }

    public function removeChampsSoumi(ChampsSoumis $champsSoumi): self
    {
        if ($this->champsSoumis->contains($champsSoumi)) {
            $this->champsSoumis->removeElement($champsSoumi);
            // set the owning side to null (unless already changed)
            if ($champsSoumi->getStartup() === $this) {
                $champsSoumi->setStartup(null);
            }
        }

        return $this;
    }

}
