<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttributionRepository")
 */
class Attribution
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenements", inversedBy="attributions")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StartUp", inversedBy="attributions")
     */
    private $startup;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?Evenements
    {
        return $this->event;
    }

    public function setEvent(?Evenements $event): self
    {
        $this->event = $event;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
