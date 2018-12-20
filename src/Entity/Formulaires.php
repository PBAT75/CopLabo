<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $satisfaction;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $upgrade;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $growth;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $contacts;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $comment;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $source;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option2;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option5;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option6;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option7;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option8;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $option9;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Evenements", inversedBy="formulaires", cascade={"persist", "remove"})
     */
    private $evenements;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getComment(): ?bool
    {
        return $this->comment;
    }

    public function setComment(bool $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOption1()
    {
        return $this->option1;
    }

    /**
     * @param mixed $option1
     */
    public function setOption1($option1): void
    {
        $this->option1 = $option1;
    }

    /**
     * @return mixed
     */
    public function getOption2()
    {
        return $this->option2;
    }

    /**
     * @param mixed $option2
     */
    public function setOption2($option2): void
    {
        $this->option2 = $option2;
    }

    /**
     * @return mixed
     */
    public function getOption3()
    {
        return $this->option3;
    }

    /**
     * @param mixed $option3
     */
    public function setOption3($option3): void
    {
        $this->option3 = $option3;
    }

    /**
     * @return mixed
     */
    public function getOption4()
    {
        return $this->option4;
    }

    /**
     * @param mixed $option4
     */
    public function setOption4($option4): void
    {
        $this->option4 = $option4;
    }

    /**
     * @return mixed
     */
    public function getOption5()
    {
        return $this->option5;
    }

    /**
     * @param mixed $option5
     */
    public function setOption5($option5): void
    {
        $this->option5 = $option5;
    }

    /**
     * @return mixed
     */
    public function getOption6()
    {
        return $this->option6;
    }

    /**
     * @param mixed $option6
     */
    public function setOption6($option6): void
    {
        $this->option6 = $option6;
    }

    /**
     * @return mixed
     */
    public function getOption7()
    {
        return $this->option7;
    }

    /**
     * @param mixed $option7
     */
    public function setOption7($option7): void
    {
        $this->option7 = $option7;
    }

    /**
     * @return mixed
     */
    public function getOption8()
    {
        return $this->option8;
    }

    /**
     * @param mixed $option8
     */
    public function setOption8($option8): void
    {
        $this->option8 = $option8;
    }

    /**
     * @return mixed
     */
    public function getOption9()
    {
        return $this->option9;
    }

    /**
     * @param mixed $option9
     */
    public function setOption9($option9): void
    {
        $this->option9 = $option9;
    }

    public function getEvenements()
    {
        return $this->evenements;
    }

    public function setEvenements(?Evenements $evenements): self
    {
        $this->evenements = $evenements;

        return $this;
    }
}
