<?php

namespace App\Entity;

use App\Repository\IngredientsRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: IngredientsRepository::class)]
class Ingredients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min:2,  max:50,)]
    private ?string $nom = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\LessThan(value: 200)] // Correction de la syntaxe
    private ?float $prix = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $datcre = null;


    public function __construct(){
        $this->datcre = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getprix(): ?float
    {
        return $this->prix;
    }

    public function setprix(float $price): static
    {
        $this->prix = $price;

        return $this;
    }

    public function getDatcre(): ?\DateTimeImmutable
    {
        return $this->datcre;
    }

    public function setDatcre(\DateTimeImmutable $datcre): static
    {
        $this->datcre = $datcre;

        return $this;
    }
}
