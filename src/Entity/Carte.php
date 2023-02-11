<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteRepository::class)]
class Carte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $plats = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlats(): array
    {
        return $this->plats;
    }

    public function setPlats(array $plats): self
    {
        $this->plats = $plats;

        return $this;
    }
}
