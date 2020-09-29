<?php

namespace App\Entity;

use App\Repository\ProspectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProspectRepository::class)
 */
class Prospect
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity=CarsForms::class, mappedBy="prospects")
     */
    private $carsForms;

    public function __construct()
    {
        $this->carsForms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection|CarsForms[]
     */
    public function getCarsForms(): Collection
    {
        return $this->carsForms;
    }

    public function addCarsForm(CarsForms $carsForm): self
    {
        if (!$this->carsForms->contains($carsForm)) {
            $this->carsForms[] = $carsForm;
            $carsForm->setProspects($this);
        }

        return $this;
    }

    public function removeCarsForm(CarsForms $carsForm): self
    {
        if ($this->carsForms->contains($carsForm)) {
            $this->carsForms->removeElement($carsForm);
            // set the owning side to null (unless already changed)
            if ($carsForm->getProspects() === $this) {
                $carsForm->setProspects(null);
            }
        }

        return $this;
    }
}
