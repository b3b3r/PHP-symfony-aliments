<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlimentRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
 * @Vich\Uploadable
 */
class Aliment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=15, minMessage="Le nom est trop court", maxMessage="Le message est trop long")
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(min=0.1, max=100, minMessage="Le prix doit être supérieur", maxMessage="Le prix doit être inférieur")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="aliments", fileNameProperty="picture")
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="integer")
     */
    private $calories;

    /**
     * @ORM\Column(type="float")
     */
    private $proteines;

    /**
     * @ORM\Column(type="float")
     */
    private $glucides;

    /**
     * @ORM\Column(type="float")
     */
    private $lipides;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="aliments")
     */
    private $type;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getProteines(): ?float
    {
        return $this->proteines;
    }

    public function setProteines(float $proteines): self
    {
        $this->proteines = $proteines;

        return $this;
    }

    public function getGlucides(): ?float
    {
        return $this->glucides;
    }

    public function setGlucides(float $glucides): self
    {
        $this->glucides = $glucides;

        return $this;
    }

    public function getLipides(): ?float
    {
        return $this->lipides;
    }

    public function setLipides(float $lipides): self
    {
        $this->lipides = $lipides;

        return $this;
    }

    public function setpictureFile(?File $pictureFile = null): self
    {
        $this->pictureFile = $pictureFile;

        if ($this->pictureFile instanceof UploadedFile) {
            $this->updated_at = new DateTime('now');
        }

        return $this;
    }

    public function getpictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
