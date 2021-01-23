<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"username"}, message="Le pseudo existe déjà")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=10, minMessage="Il faut plus de 5 caractères", maxMessage="Il faut moins de 10 caractères")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=10, minMessage="Il faut plus de 5 caractères", maxMessage="Il faut moins de 10 caractères")
     */
    private $password;

    /**
     * @Assert\Length(min=5, max=10, minMessage="Il faut plus de 5 caractères", maxMessage="Il faut moins de 10 caractères")
     * @Assert\EqualTo(propertyPath="password", message="Les mdp sont différents")
     */
    private $checkPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCheckPassword(): ?string
    {
        return $this->checkPassword;
    }

    public function setCheckPassword(string $checkPassword): self
    {
        $this->checkPassword = $checkPassword;

        return $this;
    }
    
    public function getRoles()
    {
        return ["ROLE_USER"];
    }

    public function getSalt()
    {
        
    }

    public function eraseCredentials()
    {
        
    }
}
