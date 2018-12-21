<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChampsSoumisRepository")
 */
class ChampsSoumis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $satisfaction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $upgrade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $growth;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contacts;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $option9;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StartUp", inversedBy="champsSoumis",  fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $startup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSatisfaction(): ?string
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(?string $satisfaction): self
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

    public function getUpgrade(): ?string
    {
        return $this->upgrade;
    }

    public function setUpgrade(?string $upgrade): self
    {
        $this->upgrade = $upgrade;

        return $this;
    }

    public function getGrowth(): ?string
    {
        return $this->growth;
    }

    public function setGrowth(?string $growth): self
    {
        $this->growth = $growth;

        return $this;
    }

    public function getContacts(): ?int
    {
        return $this->contacts;
    }

    public function setContacts(?int $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getOption1(): ?string
    {
        return $this->option1;
    }

    public function setOption1(?string $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getOption2(): ?string
    {
        return $this->option2;
    }

    public function setOption2(?string $option2): self
    {
        $this->option2 = $option2;

        return $this;
    }

    public function getOption3(): ?string
    {
        return $this->option3;
    }

    public function setOption3(?string $option3): self
    {
        $this->option3 = $option3;

        return $this;
    }

    public function getOption4(): ?string
    {
        return $this->option4;
    }

    public function setOption4(?string $option4): self
    {
        $this->option4 = $option4;

        return $this;
    }

    public function getOption5(): ?string
    {
        return $this->option5;
    }

    public function setOption5(?string $option5): self
    {
        $this->option5 = $option5;

        return $this;
    }

    public function getOption6(): ?string
    {
        return $this->option6;
    }

    public function setOption6(?string $option6): self
    {
        $this->option6 = $option6;

        return $this;
    }

    public function getOption7(): ?string
    {
        return $this->option7;
    }

    public function setOption7(?string $option7): self
    {
        $this->option7 = $option7;

        return $this;
    }

    public function getOption8(): ?string
    {
        return $this->option8;
    }

    public function setOption8(?string $option8): self
    {
        $this->option8 = $option8;

        return $this;
    }

    public function getOption9(): ?string
    {
        return $this->option9;
    }

    public function setOption9(?string $option9): self
    {
        $this->option9 = $option9;

        return $this;
    }

    public function getStartup(): ?StartUp
    {
        return $this->startup;
    }

    public function setStartup(?StartUp $startup): self
    {
        $this->startup = $startup;

        return $this;
    }
}
