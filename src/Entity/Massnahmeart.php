<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MassnahmeartRepository")
 */
class Massnahmeart
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
     * @ORM\OneToMany(targetEntity="App\Entity\Massnahme", mappedBy="massnahmeart")
     */
    private $massnahme;

    public function __construct()
    {
        $this->massnahme = new ArrayCollection();
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
     * @return Collection|Massnahme[]
     */
    public function getMassnahme(): Collection
    {
        return $this->massnahme;
    }

    public function addMassnahme(Massnahme $massnahme): self
    {
        if (!$this->massnahme->contains($massnahme)) {
            $this->massnahme[] = $massnahme;
            $massnahme->setMassnahmeart($this);
        }

        return $this;
    }

    public function removeMassnahme(Massnahme $massnahme): self
    {
        if ($this->massnahme->contains($massnahme)) {
            $this->massnahme->removeElement($massnahme);
            // set the owning side to null (unless already changed)
            if ($massnahme->getMassnahmeart() === $this) {
                $massnahme->setMassnahmeart(null);
            }
        }

        return $this;
    }
}
