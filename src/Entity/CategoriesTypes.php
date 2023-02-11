<?php

namespace App\Entity;

use App\Repository\CategoriesTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesTypesRepository::class)]
class CategoriesTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'categoriesTypes', targetEntity: Plats::class)]
    private Collection $categorie_types;

    public function __construct()
    {
        $this->categorie_types = new ArrayCollection();
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
     * @return Collection<int, Plats>
     */
    public function getCategorieTypes(): Collection
    {
        return $this->categorie_types;
    }

    public function addCategorieType(Plats $categorieType): self
    {
        if (!$this->categorie_types->contains($categorieType)) {
            $this->categorie_types->add($categorieType);
            $categorieType->setCategoriesTypes($this);
        }

        return $this;
    }

    public function removeCategorieType(Plats $categorieType): self
    {
        if ($this->categorie_types->removeElement($categorieType)) {
            // set the owning side to null (unless already changed)
            if ($categorieType->getCategoriesTypes() === $this) {
                $categorieType->setCategoriesTypes(null);
            }
        }

        return $this;
    }
}
