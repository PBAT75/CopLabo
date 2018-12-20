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

     * @ORM\OneToMany(targetEntity="App\Entity\StartUpRelation", mappedBy="startUp")
     */
    private $startUpRelations;

     * @ORM\OneToMany(targetEntity="App\Entity\Attribution", mappedBy="startup")
     */
    private $attributions;


    public function __construct()
    {
        $this->partners = new ArrayCollection();
        $this->externalCompanies = new ArrayCollection();

        $this->startUpRelations = new ArrayCollection();

        $this->attributions = new ArrayCollection();

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
            $startUpRelation->setStartUp($this);

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

    public function removeStartUpRelation(StartUpRelation $startUpRelation): self
    {
        if ($this->startUpRelations->contains($startUpRelation)) {
            $this->startUpRelations->removeElement($startUpRelation);
            // set the owning side to null (unless already changed)
            if ($startUpRelation->getStartUp() === $this) {
                $startUpRelation->setStartUp(null);

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

}
