<?php

namespace App\Entity;

use App\Repository\TechniquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechniquesRepository::class)
 */
class Techniques
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
    private $nom_techniques;

    /**
     * @ORM\Column(type="text")
     */
    private $description_longue_techniques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_courte_techniques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_logo_techniques;

    /**
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="techniques")
     */
    private $relation_photos;

    public function __toString()
    {
        return $this->nom_techniques;
    }
    
    public function __construct()
    {
        $this->relation_photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTechniques(): ?string
    {
        return $this->nom_techniques;
    }

    public function setNomTechniques(string $nom_techniques): self
    {
        $this->nom_techniques = $nom_techniques;

        return $this;
    }

    public function getDescriptionLongueTechniques(): ?string
    {
        return $this->description_longue_techniques;
    }

    public function setDescriptionLongueTechniques(string $description_longue_techniques): self
    {
        $this->description_longue_techniques = $description_longue_techniques;

        return $this;
    }

    public function getDescriptionCourteTechniques(): ?string
    {
        return $this->description_courte_techniques;
    }

    public function setDescriptionCourteTechniques(string $description_courte_techniques): self
    {
        $this->description_courte_techniques = $description_courte_techniques;

        return $this;
    }

    public function getImageLogoTechniques(): ?string
    {
        return $this->image_logo_techniques;
    }

    public function setImageLogoTechniques(string $image_logo_techniques): self
    {
        $this->image_logo_techniques = $image_logo_techniques;

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
            $relationPhoto->setTechniques($this);
        }

        return $this;
    }

    public function removeRelationPhoto(Photos $relationPhoto): self
    {
        if ($this->relation_photos->removeElement($relationPhoto)) {
            // set the owning side to null (unless already changed)
            if ($relationPhoto->getTechniques() === $this) {
                $relationPhoto->setTechniques(null);
            }
        }

        return $this;
    }
}
