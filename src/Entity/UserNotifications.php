<?php

namespace App\Entity;

use App\Repository\UserNotificationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserNotificationsRepository::class)
 */
class UserNotifications
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $seen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userNotifications")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeen(): ?bool
    {
        return $this->seen;
    }

    public function setSeen(bool $seen): self
    {
        $this->seen = $seen;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
