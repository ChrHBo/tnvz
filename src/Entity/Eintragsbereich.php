<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EintragsbereichRepository")
 */
class Eintragsbereich
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
     * @ORM\OneToMany(targetEntity="App\Entity\Eintragung", mappedBy="bereich")
     */
    private $eintragungen;

    public function __construct()
    {
        $this->eintragungen = new ArrayCollection();
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

    /**
     * @return Collection|Eintragung[]
     */
    public function getEintragungen(): Collection
    {
        return $this->eintragungen;
    }

    public function addEintragungen(Eintragung $eintragungen): self
    {
        if (!$this->eintragungen->contains($eintragungen)) {
            $this->eintragungen[] = $eintragungen;
            $eintragungen->setBereich($this);
        }

        return $this;
    }

    public function removeEintragungen(Eintragung $eintragungen): self
    {
        if ($this->eintragungen->contains($eintragungen)) {
            $this->eintragungen->removeElement($eintragungen);
            // set the owning side to null (unless already changed)
            if ($eintragungen->getBereich() === $this) {
                $eintragungen->setBereich(null);
            }
        }

        return $this;
    }
}
