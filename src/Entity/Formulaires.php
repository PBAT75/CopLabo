<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormulairesRepository")
 */
class Formulaires
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $satisfaction;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $upgrade;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $growth;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contacts;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $source;

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

    public function getSatisfaction(): ?bool
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(?bool $satisfaction): self
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

    public function getUpgrade(): ?bool
    {
        return $this->upgrade;
    }

    public function setUpgrade(?bool $upgrade): self
    {
        $this->upgrade = $upgrade;

        return $this;
    }

    public function getGrowth(): ?bool
    {
        return $this->growth;
    }

    public function setGrowth(?bool $growth): self
    {
        $this->growth = $growth;

        return $this;
    }

    public function getContacts(): ?bool
    {
        return $this->contacts;
    }

    public function setContacts(?bool $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getSource(): ?bool
    {
        return $this->source;
    }

    public function setSource(?bool $source): self
    {
        $this->source = $source;

        return $this;
    }
}
