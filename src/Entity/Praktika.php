<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PraktikaRepository")
 */
class Praktika
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $inhalt;

    /**
     * @ORM\Column(type="date")
     */
    private $beginn;

    /**
     * @ORM\Column(type="date")
     */
    private $ende;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Firma", inversedBy="praktikas")
     */
    private $firma;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Teilnehmer", inversedBy="praktikas")
     */
    private $teilnehmer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInhalt(): ?string
    {
        return $this->inhalt;
    }

    public function setInhalt(string $inhalt): self
    {
        $this->inhalt = $inhalt;

        return $this;
    }

    public function getBeginn(): ?\DateTimeInterface
    {
        return $this->beginn;
    }

    public function setBeginn(\DateTimeInterface $beginn): self
    {
        $this->beginn = $beginn;

        return $this;
    }

    public function getEnde(): ?\DateTimeInterface
    {
        return $this->ende;
    }

    public function setEnde(\DateTimeInterface $ende): self
    {
        $this->ende = $ende;

        return $this;
    }

    public function getFirma(): ?Firma
    {
        return $this->firma;
    }

    public function setFirma(?Firma $firma): self
    {
        $this->firma = $firma;

        return $this;
    }

    public function getTeilnehmer(): ?Teilnehmer
    {
        return $this->teilnehmer;
    }

    public function setTeilnehmer(?Teilnehmer $teilnehmer): self
    {
        $this->teilnehmer = $teilnehmer;

        return $this;
    }
}
