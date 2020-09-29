<?php

namespace App\Entity;

use App\Repository\CarsFormsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsFormsRepository::class)
 */
class CarsForms
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
    private $modele;

    /**
     * @ORM\Column(type="text")
     */
    private $model;

    /**
     * @ORM\Column(type="text")
     */
    private $brand;

    /**
     * @ORM\Column(type="smallint")
     */
    private $power;

    /**
     * @ORM\Column(type="text")
     */
    private $gas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registration;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_insurance;

    /**
     * @ORM\ManyToOne(targetEntity=prospect::class, inversedBy="carsForms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prospects;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getGas(): ?string
    {
        return $this->gas;
    }

    public function setGas(string $gas): self
    {
        $this->gas = $gas;

        return $this;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    public function getHasInsurance(): ?bool
    {
        return $this->has_insurance;
    }

    public function setHasInsurance(bool $has_insurance): self
    {
        $this->has_insurance = $has_insurance;

        return $this;
    }

    public function getProspects(): ?prospect
    {
        return $this->prospects;
    }

    public function setProspects(?prospect $prospects): self
    {
        $this->prospects = $prospects;

        return $this;
    }
}
