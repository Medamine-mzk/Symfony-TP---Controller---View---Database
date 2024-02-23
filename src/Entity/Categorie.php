<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameCat = null;

    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'categorie')]
    private Collection $listProduits;

    public function __construct()
    {
        $this->listProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCat(): ?string
    {
        return $this->nameCat;
    }

    public function setNameCat(string $nameCat): static
    {
        $this->nameCat = $nameCat;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getListProduits(): Collection
    {
        return $this->listProduits;
    }

    public function addListProduit(Produit $listProduit): static
    {
        if (!$this->listProduits->contains($listProduit)) {
            $this->listProduits->add($listProduit);
            $listProduit->setCategorie($this);
        }

        return $this;
    }

    public function removeListProduit(Produit $listProduit): static
    {
        if ($this->listProduits->removeElement($listProduit)) {
            // set the owning side to null (unless already changed)
            if ($listProduit->getCategorie() === $this) {
                $listProduit->setCategorie(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->getNameCat();
    }
}
