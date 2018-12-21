<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StartUpRelationRepository")
 */
class StartUpRelation
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
    private $action;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="startUpRelations",  fetch="EAGER")
     */
    private $partner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ExternalCompany", inversedBy="startUpRelations", fetch="EAGER")
     */
    private $externalCompany;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StartUp", inversedBy="startUpRelations", fetch="EAGER")
     */
    private $startUp;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;

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

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(?string $other): self
    {
        $this->other = $other;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    public function getExternalCompany(): ?ExternalCompany
    {
        return $this->externalCompany;
    }

    public function setExternalCompany(?ExternalCompany $externalCompany): self
    {
        $this->externalCompany = $externalCompany;

        return $this;
    }

    public function getStartUp(): ?StartUp
    {
        return $this->startUp;
    }

    public function setStartUp(?StartUp $startUp): self
    {
        $this->startUp = $startUp;

        return $this;
    }
}
