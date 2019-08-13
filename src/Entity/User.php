<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=72)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=72, nullable=true)
     */
    private $pwdhash;

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

    public function getPwdhash(): ?string
    {
        return $this->pwdhash;
    }

    public function setPwdhash(?string $pwdhash): self
    {
        $this->pwdhash = $pwdhash;

        return $this;
    }
}
