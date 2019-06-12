<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MassnahmeRepository")
 */
class Massnahme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $beginn;

    /**
     * @ORM\Column(type="date")
     */
    private $ende;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Massnahmeart", inversedBy="massnahme")
     */
    private $massnahmeart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Teilnehmer", inversedBy="massnahmen")
     */
    private $teilnehmer;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMassnahmeart(): ?Massnahmeart
    {
        return $this->massnahmeart;
    }

    public function setMassnahmeart(?Massnahmeart $massnahmeart): self
    {
        $this->massnahmeart = $massnahmeart;

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
