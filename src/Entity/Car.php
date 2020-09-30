<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Prospect::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prospect;

    /**
     * @ORM\Column(type="smallint")
     */
    private $power;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registration;

    /**
     * @ORM\Column(type="boolean")
     */
    private $insuranceExist;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProspect(): ?Prospect
    {
        return $this->prospect;
    }

    public function setProspect(?Prospect $prospect): self
    {
        $this->prospect = $prospect;

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

    public function getInsuranceExist(): ?bool
    {
        return $this->insuranceExist;
    }

    public function setInsuranceExist(bool $insuranceExist): self
    {
        $this->insuranceExist = $insuranceExist;

        return $this;
    }
}
