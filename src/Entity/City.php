<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $cp;

    /**
     * @ORM\OneToMany(targetEntity=Agency::class, mappedBy="city")
     */
    private $agencies;

    /**
     * @ORM\ManyToMany(targetEntity=Agency::class, mappedBy="cities")
     */
    private $nearbyAgencies;

    /**
     * @ORM\OneToMany(targetEntity=Prospect::class, mappedBy="city")
     */
    private $prospects;

    public function __construct()
    {
        $this->agencies = new ArrayCollection();
        $this->nearbyAgencies = new ArrayCollection();
        $this->prospects = new ArrayCollection();
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

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * @return Collection|Agency[]
     */
    public function getAgencies(): Collection
    {
        return $this->agencies;
    }

    public function addAgency(Agency $agency): self
    {
        if (!$this->agencies->contains($agency)) {
            $this->agencies[] = $agency;
            $agency->setCity($this);
        }

        return $this;
    }

    public function removeAgency(Agency $agency): self
    {
        if ($this->agencies->contains($agency)) {
            $this->agencies->removeElement($agency);
            // set the owning side to null (unless already changed)
            if ($agency->getCity() === $this) {
                $agency->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Agency[]
     */
    public function getNearbyAgencies(): Collection
    {
        return $this->nearbyAgencies;
    }

    public function addNearbyAgency(Agency $nearbyAgency): self
    {
        if (!$this->nearbyAgencies->contains($nearbyAgency)) {
            $this->nearbyAgencies[] = $nearbyAgency;
            $nearbyAgency->addCity($this);
        }

        return $this;
    }

    public function removeNearbyAgency(Agency $nearbyAgency): self
    {
        if ($this->nearbyAgencies->contains($nearbyAgency)) {
            $this->nearbyAgencies->removeElement($nearbyAgency);
            $nearbyAgency->removeCity($this);
        }

        return $this;
    }

    /**
     * @return Collection|Prospect[]
     */
    public function getProspects(): Collection
    {
        return $this->prospects;
    }

    public function addProspect(Prospect $prospect): self
    {
        if (!$this->prospects->contains($prospect)) {
            $this->prospects[] = $prospect;
            $prospect->setCity($this);
        }

        return $this;
    }

    public function removeProspect(Prospect $prospect): self
    {
        if ($this->prospects->contains($prospect)) {
            $this->prospects->removeElement($prospect);
            // set the owning side to null (unless already changed)
            if ($prospect->getCity() === $this) {
                $prospect->setCity(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
