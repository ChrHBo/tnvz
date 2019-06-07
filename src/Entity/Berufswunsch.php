<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BerufswunschRepository")
 */
class Berufswunsch
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
     * @ORM\OneToMany(targetEntity="App\Entity\Teilnehmer", mappedBy="berufswunsch")
     */
    private $teilnehmers;

    public function __construct()
    {
        $this->teilnehmers = new ArrayCollection();
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
     * @return Collection|Teilnehmer[]
     */
    public function getTeilnehmers(): Collection
    {
        return $this->teilnehmers;
    }

    public function addTeilnehmer(Teilnehmer $teilnehmer): self
    {
        if (!$this->teilnehmers->contains($teilnehmer)) {
            $this->teilnehmers[] = $teilnehmer;
            $teilnehmer->setBerufswunsch($this);
        }

        return $this;
    }

    public function removeTeilnehmer(Teilnehmer $teilnehmer): self
    {
        if ($this->teilnehmers->contains($teilnehmer)) {
            $this->teilnehmers->removeElement($teilnehmer);
            // set the owning side to null (unless already changed)
            if ($teilnehmer->getBerufswunsch() === $this) {
                $teilnehmer->setBerufswunsch(null);
            }
        }

        return $this;
    }
}
