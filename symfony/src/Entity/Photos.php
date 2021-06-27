<?php

namespace App\Entity;

use App\Repository\PhotosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotosRepository::class)
 */
class Photos
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
    private $url_photos;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titre_photos;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $exif_dimensions_photos;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $exif_date_photos;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $exif_speed_photos;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $exif_apperture_photos;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $exif_iso_photos;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $exif_focale_photos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $exif_objectif_photos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $exif_cam_photos;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="relation_photos")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=Techniques::class, inversedBy="relation_photos")
     */
    private $techniques;

    /**
     * @ORM\ManyToOne(targetEntity=Photographe::class, inversedBy="relation_photos")
     */
    private $photographe;
    
    public function __toString()
    {
        return $this->url_photos;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlPhotos(): ?string
    {
        return $this->url_photos;
    }

    public function setUrlPhotos(string $url_photos): self
    {
        $this->url_photos = $url_photos;

        return $this;
    }

    public function getTitrePhotos(): ?string
    {
        return $this->titre_photos;
    }

    public function setTitrePhotos(string $titre_photos): self
    {
        $this->titre_photos = $titre_photos;

        return $this;
    }

    public function getExifDimensionsPhotos(): ?string
    {
        return $this->exif_dimensions_photos;
    }

    public function setExifDimensionsPhotos(?string $exif_dimensions_photos): self
    {
        $this->exif_dimensions_photos = $exif_dimensions_photos;

        return $this;
    }

    public function getExifDatePhotos(): ?\DateTimeInterface
    {
        return $this->exif_date_photos;
    }

    public function setExifDatePhotos(?\DateTimeInterface $exif_date_photos): self
    {
        $this->exif_date_photos = $exif_date_photos;

        return $this;
    }

    public function getExifSpeedPhotos(): ?string
    {
        return $this->exif_speed_photos;
    }

    public function setExifSpeedPhotos(?string $exif_speed_photos): self
    {
        $this->exif_speed_photos = $exif_speed_photos;

        return $this;
    }

    public function getExifApperturePhotos(): ?string
    {
        return $this->exif_apperture_photos;
    }

    public function setExifApperturePhotos(?string $exif_apperture_photos): self
    {
        $this->exif_apperture_photos = $exif_apperture_photos;

        return $this;
    }

    public function getExifIsoPhotos(): ?string
    {
        return $this->exif_iso_photos;
    }

    public function setExifIsoPhotos(?string $exif_iso_photos): self
    {
        $this->exif_iso_photos = $exif_iso_photos;

        return $this;
    }

    public function getExifFocalePhotos(): ?string
    {
        return $this->exif_focale_photos;
    }

    public function setExifFocalePhotos(?string $exif_focale_photos): self
    {
        $this->exif_focale_photos = $exif_focale_photos;

        return $this;
    }

    public function getExifObjectifPhotos(): ?string
    {
        return $this->exif_objectif_photos;
    }

    public function setExifObjectifPhotos(?string $exif_objectif_photos): self
    {
        $this->exif_objectif_photos = $exif_objectif_photos;

        return $this;
    }

    public function getExifCamPhotos(): ?string
    {
        return $this->exif_cam_photos;
    }

    public function setExifCamPhotos(?string $exif_cam_photos): self
    {
        $this->exif_cam_photos = $exif_cam_photos;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getTechniques(): ?Techniques
    {
        return $this->techniques;
    }

    public function setTechniques(?Techniques $techniques): self
    {
        $this->techniques = $techniques;

        return $this;
    }

    public function getPhotographe(): ?Photographe
    {
        return $this->photographe;
    }

    public function setPhotographe(?Photographe $photographe): self
    {
        $this->photographe = $photographe;

        return $this;
    }
}
