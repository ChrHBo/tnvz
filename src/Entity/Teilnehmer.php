<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeilnehmerRepository")
 */
class Teilnehmer
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
     * @ORM\Column(type="string", length=255)
     */
    private $vorname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="date")
     */
    private $geburtsdatum;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mitarbeiter", inversedBy="teilnehmers")
     */
    private $ansprechpartner;

    public function __construct()
    {
        $this->ansprechpartner = new ArrayCollection();
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

    public function getVorname(): ?string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): self
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getFon(): ?string
    {
        return $this->fon;
    }

    public function setFon(?string $fon): self
    {
        $this->fon = $fon;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGeburtsdatum(): ?\DateTimeInterface
    {
        return $this->geburtsdatum;
    }

    public function setGeburtsdatum(\DateTimeInterface $geburtsdatum): self
    {
        $this->geburtsdatum = $geburtsdatum;

        return $this;
    }

    /**
     * @return Collection|Mitarbeiter[]
     */
    public function getAnsprechpartner(): Collection
    {
        return $this->ansprechpartner;
    }

    public function addAnsprechpartner(Mitarbeiter $ansprechpartner): self
    {
        if (!$this->ansprechpartner->contains($ansprechpartner)) {
            $this->ansprechpartner[] = $ansprechpartner;
        }

        return $this;
    }

    public function removeAnsprechpartner(Mitarbeiter $ansprechpartner): self
    {
        if ($this->ansprechpartner->contains($ansprechpartner)) {
            $this->ansprechpartner->removeElement($ansprechpartner);
        }

        return $this;
    }
}
