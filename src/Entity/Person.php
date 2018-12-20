<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
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
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $Image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\StartUp", inversedBy="person", cascade={"persist", "remove"})
     */
    private $startup;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Partner", inversedBy="person", cascade={"persist", "remove"})
     */
    private $partner;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ExternalCompany", inversedBy="person", cascade={"persist", "remove"})
     */
    private $externalCompany;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qrCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

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

    public function getQrCode(): ?string
    {
        return $this->qrCode;
    }

    public function setQrCode(string $qrCode): self
    {
        $this->qrCode = $qrCode;

        return $this;
    }
}
