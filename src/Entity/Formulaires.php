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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

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
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option1;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option2;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option3;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option4;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option5;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option6;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option7;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option8;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $option9;

    public function __construct()
    {
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

    public function getOption1(): ?bool
    {
        return $this->option1;
    }

    public function setOption1(bool $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getOption2(): ?bool
    {
        return $this->option2;
    }

    public function setOption2(bool $option2): self
    {
        $this->option2 = $option2;

        return $this;
    }

    public function getOption3(): ?bool
    {
        return $this->option3;
    }

    public function setOption3(bool $option3): self
    {
        $this->option3 = $option3;

        return $this;
    }

    public function getOption4(): ?bool
    {
        return $this->option4;
    }

    public function setOption4(bool $option4): self
    {
        $this->option4 = $option4;

        return $this;
    }

    public function getOption5(): ?bool
    {
        return $this->option5;
    }

    public function setOption5(bool $option5): self
    {
        $this->option5 = $option5;

        return $this;
    }

    public function getOption6(): ?bool
    {
        return $this->option6;
    }

    public function setOption6(bool $option6): self
    {
        $this->option6 = $option6;

        return $this;
    }

    public function getOption7(): ?bool
    {
        return $this->option7;
    }

    public function setOption7(bool $option7): self
    {
        $this->option7 = $option7;

        return $this;
    }

    public function getOption8(): ?bool
    {
        return $this->option8;
    }

    public function setOption8(bool $option8): self
    {
        $this->option8 = $option8;

        return $this;
    }

    public function getOption9(): ?bool
    {
        return $this->option9;
    }

    public function setOption9(bool $option9): self
    {
        $this->option9 = $option9;

        return $this;
    }

}
