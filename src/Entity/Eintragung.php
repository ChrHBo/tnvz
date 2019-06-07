<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EintragungRepository")
 */
class Eintragung
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Teilnehmer", inversedBy="eintragungen")
     */
    private $teilnehmer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Eintragsbereich", inversedBy="eintragungen")
     */
    private $bereich;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datum;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBereich(): ?Eintragsbereich
    {
        return $this->bereich;
    }

    public function setBereich(?Eintragsbereich $bereich): self
    {
        $this->bereich = $bereich;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(?\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
