<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\PhotographeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=PhotographeRepository::class)
 */
class Photographe
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
    private $nom_photographe;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom_photographe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_photographe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar_photographe;

    /**
     * @ORM\Column(type="text")
     */
    private $description_photographe;

    /**
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="photographe")
     */
    private $relation_photos;

    public function __toString()
    {
        return $this->nom_photographe;
    }
    

    public function __construct()
    {
        $this->relation_photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPhotographe(): ?string
    {
        return $this->nom_photographe;
    }

    public function setNomPhotographe(string $nom_photographe): self
    {
        $this->nom_photographe = $nom_photographe;

        return $this;
    }

    public function getPrenomPhotographe(): ?string
    {
        return $this->prenom_photographe;
    }

    public function setPrenomPhotographe(string $prenom_photographe): self
    {
        $this->prenom_photographe = $prenom_photographe;

        return $this;
    }

    public function getEmailPhotographe(): ?string
    {
        return $this->email_photographe;
    }

    public function setEmailPhotographe(string $email_photographe): self
    {
        $this->email_photographe = $email_photographe;

        return $this;
    }

    public function getAvatarPhotographe(): ?string
    {
        return $this->avatar_photographe;
    }

    public function setAvatarPhotographe(?string $avatar_photographe): self
    {
        $this->avatar_photographe = $avatar_photographe;

        return $this;
    }

    public function getDescriptionPhotographe(): ?string
    {
        return $this->description_photographe;
    }

    public function setDescriptionPhotographe(string $description_photographe): self
    {
        $this->description_photographe = $description_photographe;

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
            $relationPhoto->setPhotographe($this);
        }

        return $this;
    }

    public function removeRelationPhoto(Photos $relationPhoto): self
    {
        if ($this->relation_photos->removeElement($relationPhoto)) {
            // set the owning side to null (unless already changed)
            if ($relationPhoto->getPhotographe() === $this) {
                $relationPhoto->setPhotographe(null);
            }
        }

        return $this;
    }
}
