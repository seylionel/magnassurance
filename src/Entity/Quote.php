<?php

namespace App\Entity;

use App\Repository\QuoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuoteRepository::class)
 */
class Quote
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
    private $fileName;

    /**
     * @ORM\ManyToOne(targetEntity=Prospect::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prospect;

    /**
     * @ORM\ManyToOne(targetEntity=Agency::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agency;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $quoteValidation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

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

    public function getAgency(): ?Agency
    {
        return $this->agency;
    }

    public function setAgency(?Agency $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    public function getQuoteValidation(): ?bool
    {
        return $this->quoteValidation;
    }

    public function setQuoteValidation(?bool $quoteValidation): self
    {
        $this->quoteValidation = $quoteValidation;

        return $this;
    }
}
