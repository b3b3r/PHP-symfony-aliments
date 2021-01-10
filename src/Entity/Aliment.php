<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
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
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

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

    public function setPicture(string $picture): self
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
}
