<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MitarbeiterRepository")
 */
class Mitarbeiter
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
     * @ORM\Column(type="string", length=255)
     */
    private $raum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Funktion", inversedBy="mitarbeiters")
     */
    private $funktion;

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

    public function getRaum(): ?string
    {
        return $this->raum;
    }

    public function setRaum(string $raum): self
    {
        $this->raum = $raum;

        return $this;
    }

    public function getFon(): ?string
    {
        return $this->fon;
    }

    public function setFon(string $fon): self
    {
        $this->fon = $fon;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFunktion(): ?Funktion
    {
        return $this->funktion;
    }

    public function setFunktion(?Funktion $funktion): self
    {
        $this->funktion = $funktion;

        return $this;
    }
}
