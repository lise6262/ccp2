<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_categories;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_categories;

    /**
     * @ORM\Column(type="text")
     */
    private $description_longue_categories;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_logo_categories;

    /**
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="categories")
     */
    private $relation_photos;

    public function __toString()
    {
        return $this->nom_categories;
    }
    
    public function __construct()
    {
        $this->relation_photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategories(): ?string
    {
        return $this->nom_categories;
    }

    public function setNomCategories(string $nom_categories): self
    {
        $this->nom_categories = $nom_categories;

        return $this;
    }

    public function getDescriptionCategories(): ?string
    {
        return $this->description_categories;
    }

    public function setDescriptionCategories(string $description_categories): self
    {
        $this->description_categories = $description_categories;

        return $this;
    }

    public function getDescriptionLongueCategories(): ?string
    {
        return $this->description_longue_categories;
    }

    public function setDescriptionLongueCategories(string $description_longue_categories): self
    {
        $this->description_longue_categories = $description_longue_categories;

        return $this;
    }

    public function getImageLogoCategories(): ?string
    {
        return $this->image_logo_categories;
    }

    public function setImageLogoCategories(string $image_logo_categories): self
    {
        $this->image_logo_categories = $image_logo_categories;

        return $this;
    }

    /**
     * @return Collection|Photos[]
     */
    public function getRelationPhotos(): Collection
    {
        return $this->relation_photos;
    }

    public function addRelationPhoto(Photos $relationPhoto): self
    {
        if (!$this->relation_photos->contains($relationPhoto)) {
            $this->relation_photos[] = $relationPhoto;
            $relationPhoto->setCategories($this);
        }

        return $this;
    }

    public function removeRelationPhoto(Photos $relationPhoto): self
    {
        if ($this->relation_photos->removeElement($relationPhoto)) {
            // set the owning side to null (unless already changed)
            if ($relationPhoto->getCategories() === $this) {
                $relationPhoto->setCategories(null);
            }
        }

        return $this;
    }
}
